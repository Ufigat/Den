<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Tourists;
use app\models\People;
use app\models\Party;
use app\models\Section;
use app\models\FoundTourists;
use app\models\FoundSection;
use app\models\FoundParty;
use app\models\FoundRouts;
use app\models\FoundScroll;
use app\models\FoundLoad;
use app\models\FoundPoints;
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
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
     * {@inheritdoc}
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
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionMain() {
        $FoundSection = new FoundSection();
        $FoundParty = new FoundParty();
        $FoundRouts = new FoundRouts();
        $FoundScroll = new FoundScroll();
        $FoundLoad = new FoundLoad();
        $FoundPoints = new FoundPoints();
        $Trainers = yii::$app->db->createCommand(
            "SELECT people.full_name,people.year_of_birth,people.gender,trainers.wage,trainers.specialization 
            FROM trainers 
            JOIN people on trainers.people = people.id 
            JOIN section on trainers.id = section.trainer;
            ")->queryAll();
        $Long = yii::$app->db->createCommand(
            "SELECT people.full_name, people.type, people.year_of_birth, people.gender,people.category,party.name as party,section.name as section, route.points,  count(hike.id) as hike_count 
                FROM tourists 
                JOIN party on tourists.party = party.id 
                JOIN people on tourists.people = people.id 
                JOIN section on party.section = section.id 
                JOIN trainers on section.trainer = trainers.id 
                RIGHT JOIN hike on trainers.id = hike.trainer 
                JOIN route on hike.route = route.id
                GROUP BY people.full_name, people.type, people.year_of_birth, people.gender,people.category,party.name,section.name,hike.id;
            ")->queryAll();
        $Сompetitions  = yii::$app->db->createCommand(
            "SELECT competition_name.name as competition, people.full_name as people, section.name as section
             FROM competition_name 
             JOIN competition_id on competition_name.id = competition_id.id_name 
             JOIN competition on competition_id.id_competition = competition.id 
             JOIN people on competition.people=people.id 
             JOIN tourists on people.id = tourists.people 
             JOIN party on tourists.party = party.id 
             JOIN section on party.section = section.id;
            ")->queryAll();
        $Leaders = yii::$app->db->createCommand(
            "SELECT people.full_name, people.year_of_birth, people.gender, leaders.wage, leaders.begin 
             FROM leaders JOIN people on leaders.people = people.id;
            ")->queryAll();
        $Tourists12 = yii::$app->db->createCommand(
            "SELECT people.full_name, people.type, party.name as party,section.name as section,route.name 
             FROM tourists JOIN party on tourists.party = party.id 
             JOIN people on tourists.people = people.id 
             JOIN section on party.section = section.id 
             JOIN trainers on section.trainer = trainers.id 
             RIGHT JOIN hike on trainers.id = hike.trainer 
             JOIN route on hike.route = route.id
             WHERE section.trainer = hike.trainer;
            ")->queryAll();
        $Tourists_count = yii::$app->db->createCommand(
            "SELECT people.full_name, people.type, party.name as party,section.name as section, route.name
            FROM tourists 
            JOIN party on tourists.party = party.id 
            JOIN people on tourists.people = people.id 
            JOIN section on party.section = section.id 
            JOIN trainers on section.trainer = trainers.id 
            RIGHT JOIN unscheduled_hike on trainers.id = unscheduled_hike.trainer
            JOIN route on unscheduled_hike.route = route.id

            UNION ALL 

            SELECT people.full_name, people.type, party.name as party,section.name as section, route.name
            FROM tourists 
            JOIN party on tourists.party = party.id 
            JOIN people on tourists.people = people.id 
            JOIN section on party.section = section.id 
            JOIN trainers on section.trainer = trainers.id 
            RIGHT JOIN hike on trainers.id = hike.trainer 
            JOIN route on hike.route = route.id;
            ")->queryAll();
        //$tourists = Tourists::find()->all();
        if ($FoundSection->load(Yii::$app->request->post()) && $FoundSection->validate()) {
            $dt = yii::$app->db->createCommand("
            SELECT people.full_name, people.type, people.year_of_birth, people.gender,people.category,party.name as party,section.name as section
            FROM tourists 
            JOIN party on tourists.party = party.id 
            JOIN people on tourists.people = people.id 
            JOIN section on party.section = section.id
            where section.name like '{$FoundSection->text}' ;
            ")->queryAll();
            return $this->render('tourists', ['tourists' => $dt]);
        }
        if ($FoundParty->load(Yii::$app->request->post()) && $FoundParty->validate()) {
            $dt = yii::$app->db->createCommand("
            SELECT schedule.place as place, party.name, schedule.date, schedule.time, schedule.hour, people.full_name
            FROM schedule 
            JOIN party on schedule.party = party.id 
            JOIN trainers on schedule.trainer = trainers.id 
            JOIN people on trainers.people = people.id
            WHERE party.name LIKE '{$FoundParty->text}';
            ")->queryAll();
            return $this->render('trainers', ['trainers' => $dt]);
        }
        if ($FoundRouts->load(Yii::$app->request->post()) && $FoundRouts->validate()) {
            $dt = yii::$app->db->createCommand("
            SELECT people.full_name, people.type, party.name as party,section.name as section,route.name 
            FROM tourists 
            JOIN party on tourists.party = party.id 
            JOIN people on tourists.people = people.id 
            JOIN section on party.section = section.id 
            JOIN trainers on section.trainer = trainers.id 
            RIGHT JOIN hike on trainers.id = hike.trainer 
            JOIN route on hike.route = route.id
            WHERE route.name LIKE '{$FoundRouts->text}';
            ")->queryAll();
            return $this->render('routs', ['routs' => $dt]);
        }
        if ($FoundLoad->load(Yii::$app->request->post()) && $FoundLoad->validate()) {
            $dt = yii::$app->db->createCommand("
            SELECT people.full_name, schedule.place, party.name, sum(schedule.hour*schedule.count) as loading from people 
            JOIN trainers on trainers.people = people.id 
            JOIN schedule on schedule.trainer = trainers.id
            RIGHT JOIN party on  schedule.party = party.id
            Where party.name = '{$FoundLoad->party}'
            OR schedule.date BETWEEN '{$FoundLoad->date_start}' AND '{$FoundLoad->date_end}'
            OR people.full_name = '{$FoundLoad->trainer}'
            GROUP BY people.full_name, schedule.place, party.name;
            ")->queryAll();
            return $this->render('load', ['loads' => $dt]);
        }
        if ($FoundPoints->load(Yii::$app->request->post()) && $FoundPoints->validate()) {
            $dt = yii::$app->db->createCommand("
            SELECT hike.id,route.distance, route.points, route.complexity From hike 
            JOIN route on hike.route = route.id;
            Where route.distance = '{$FoundPoints->point}'
            OR route.points = '{$FoundPoints->length}'
            OR route.complexity = '{$FoundPoints->complexity}';
            ")->queryAll();
            return $this->render('point', ['points' => $dt]);
        }
        if ($FoundScroll->load(Yii::$app->request->post()) && $FoundScroll->validate()) {
            $dt = yii::$app->db->createCommand("
            SELECT people.full_name, people.type, people.category, hike.id, route.name FROM people
            JOIN trainers on people.id = trainers.people
            JOIN hike on trainers.id = hike.trainer
            RIGHT JOIN route on hike.route = route.id
            Where people.category = '{$FoundScroll->category}'
            OR hike.id = '{$FoundScroll->hike}'
            OR route.name = '{$FoundScroll->route}'
            OR route.points LIKE '{$FoundScroll->points}';
            ")->queryAll();
            return $this->render('scrolls', ['scrolls' => $dt]);
        }
                return $this->render('main', [
            'FoundSection' => $FoundSection,
            'Trainers' => $Trainers,
            'Сompetitions' => $Сompetitions,
            'FoundParty' => $FoundParty,
            'Long' => $Long,
            'Leaders' => $Leaders,
            'FoundRouts' => $FoundRouts,
            'Tourists12' => $Tourists12,
            'Tourists_count' => $Tourists_count,
            'FoundScroll' => $FoundScroll,
            'FoundLoad' => $FoundLoad,
            'FoundPoints' => $FoundPoints
            ]);
    }
}
