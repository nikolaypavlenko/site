<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\Pagination;
use yii\data\ArrayDataProvider;
use yii\data\DataProviderInterface;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\Tag;
use common\models\Product;
use common\models\News;
use common\models\RelationTag;
use common\models\LoginForm;
use common\models\Comment;



/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $tag = Tag::find()->all();
        $news = News::find()->all();
     
         // постраничный вывод товара
        $query = Product::find()
                ->select('product.*')
                ->leftJoin('img', '`img`.`product_id` = `product`.`id`')
                ->where(['product.status' => 1])
                ->with('img'); // присоединяемая таблица
                //->all();
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 9]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();

     
        return $this->render('index', [
                'tag' => $tag,
                'posts' => $posts,
                'pages' => $pages,
                'news' => $news,
            ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionDetail($id)
    {
        $comment = new Comment;

        
        if ($comment->load(Yii::$app->request->post())) {
                $comment->product_id = $_GET['id'];
                if(!Yii::$app->user->isGuest) {
                    $comment->user_id = Yii::$app->user->id;
                }
                $comment->save();
        }

        //var_dump($comment->save(), $comment->validate(), $comment->errors); die();

        $product = Product::find()->where(['id' => $id])->one();


            return $this->render('detail', [
                'product' => $product,
                'comment' => $comment,

            ]);
    }

    public function actionDetailtag($id)
    {

        $tag = Tag::find()->all(); // для левого сайдбара

        $query = Tag::find($id)
                ->select (['*'])
                //->from(`product`, `image`)
                ->leftJoin('relation_tag', '`relation_tag`.`tag_id` = `tag`.`id`')
                ->leftJoin('product', '`relation_tag`.`product_id` = `product`.`id`')
                ->leftJoin('img', '`img`.`product_id` = `product`.`id`')
                ->where("`tag`.`id` = '{$id}' AND `product`.`status` = 1 ")
                //->with('product')
                ->asArray();
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 9]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();

            return $this->render('detailtag', [
                'posts' => $posts,
                'pages' => $pages,
                'tag' => $tag,
                'tags' => $tags
                ]);
    }

    public function actionDetailnews($id)
    {
        $news = News::find()->where(['id' => $id])->one();

            return $this->render('detailnews', [
                'news' => $news,
            ]);

    }

    public function actionNews()
    {
        $news = News::find()->all();

            return $this->render('news', [
                'news' => $news,
            ]);
    }


    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
