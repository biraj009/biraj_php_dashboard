<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class UsersController extends Controller
{
    
    public function actionUsers(){
        $session = Yii::$app->session;
        if(!isset($session['user_name']) && !isset($session['type'])){
            Yii::$app->response->redirect(['login/index']);
        }
    	$user_details=(new \yii\db\Query())
            ->select(['*'])
            ->from('user')
            ->where(' deleted = :deleted ', [':deleted' => 0])
            ->all();
    	return $this->render('users', ['user_details' => $user_details]);
    }

    public function actionStatuschange(){

    	if($_POST){
    		$id = $_POST['id'];
    		$status = $_POST['status'];
    		if($id){
    			$user_details = \app\models\User::find()->where(array('id'=>$id))->one();
    			if($user_details){
    				$user_details->status = $status;
    				if($user_details->validate() && $user_details->save()){
    					$data = array('status' => 1, 'message' => 'status changed successfully');
                        Yii::$app->response->format = Response::FORMAT_JSON;
                        return $data;
    				} else {
    					echo json_encode(array('status' => 0, 'error' => 'status not changed'));	
    				}
    			}
    		}
    	}
    }
}


