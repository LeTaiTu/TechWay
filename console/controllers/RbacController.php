<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller 
{
	public function actionInit(){
		$auth = Yii::$app->authManager;

		//add perminssion
		// $createNumber = $auth->createPermission('create-number');
		// $createNumber->description = "Create A Number"; 
		// $auth->add($createNumber);
		// $indexNumber = $auth->createPermission('index-number');
		// $indexNumber->description = "Index A Number"; 
		// $auth->add($indexNumber);
		// $updateNumber = $auth->createPermission('update-number');
		// $updateNumber->description = "Update A Number"; 
		// $auth->add($updateNumber);
		// $viewNumber = $auth->createPermission('view-number');
		// $viewNumber->description = "View A Number"; 
		// $auth->add($viewNumber);
		// $deleteNumber = $auth->createPermission('delete-number');
		// $deleteNumber->description = "Delete A Number"; 
		// $auth->add($deleteNumber);

		//add manager
		// $numberAdmin = $auth->createRole('Admin-Number');
		// $auth->add($numberAdmin);
		$Admin = $auth->createRole('Administrator');
		// $auth->add($Admin);
		
		//Gán quyền vào nhóm
		// $auth->addChild($numberAdmin, $createNumber);
		// $auth->addChild($numberAdmin, $indexNumber);
		// $auth->addChild($numberAdmin, $updateNumber);
		// $auth->addChild($numberAdmin, $viewNumber);
		// $auth->addChild($numberAdmin, $deleteNumber);
		// $auth->addChild($Admin, $numberAdmin);


		//Gán nhóm với id của user
		// $auth->assign($numberAdmin, 2);
		$auth->assign($Admin, 1);

	}
}


?>