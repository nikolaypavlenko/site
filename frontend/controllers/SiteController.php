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
        //$test = Tag::find()->where(['id' => 2])->one();

     
         // постраничный вывод товара
        $query = Product::find()->select('id, title_ru, description_ru, logo, price')->orderBy('id DESC')->where(['status'=> 1 ]);
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



        //$tag = Tag::find()->all();
        $product = Product::find()->where(['id' => $id])->one();

        //$tags = $product->tag;

        //var_dump($tags); die();


            return $this->render('detail', [
                'product' => $product,
                //'tags' => $tags,
                //'tag' => $tag,
                'comment' => $comment,

            ]);
    }

    public function actionDetailtag($id)
    {

        $tag = Tag::find()->all(); // для левого сайдбара
        $tags = Tag::find()->where(['id' => $id])->one(); // получение объекта объединенных таблиц

        foreach ($tags->product as $product) { // получение массива продуктов со статусом 1, отбрасывая другие статусы
            if($product->status == 1) {
            $prod[] = $product;
            }
        }

        //эксперимент вывода модели по 9 продуктов с расбивкой на страницы
        // по результатам - вывод данных в таблице, но $provider это объект в отличие от массива $prod[] (предыдущий вариант вывода)
        $provider = new ArrayDataProvider([ 
                'allModels' => $prod,
                'pagination' => [
                'pageSize' => 9,
                ],
            ]);
        $rows = $provider->getModels();
        $count = $provider->getCount();
        $totalCount = $provider->getTotalCount();

            return $this->render('detailtag', [
                'provider' => $provider,
                'tag' => $tag,
                ]);

/*$customers = Customer::find()
    ->select('customer.*')
    ->leftJoin('order', '`order`.`customer_id` = `customer`.`id`')
    ->where(['order.status' => Order::STATUS_ACTIVE])
    ->with('orders')
    ->all();*/

            
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
