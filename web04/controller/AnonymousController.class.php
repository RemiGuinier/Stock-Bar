<?php

class AnonymousController extends Controller{

	
	public function __construct($request){
		
		if(isset($_POST['inscLogin']) && isset($_POST['inscPassword']) && isset($_POST['mail']) && isset($_POST['nom'])){
			$this->validateInscription($request);
		}
		
	}
	
	public function defaultAction(){
		$view = new AnonymousView($this,'Anonymous');
		$view->render();

	}
	
	public function inscription(){
		$view = new InscriptionView($this,'inscriptionAnonymous');
		$view->render();
	}
	
	public function HallOfFame(){
		$view = new HalloffameView($this,'Halloffame',AnonymousModel::getBestUsers());
                $view->setArg('terminee', AnonymousModel::getPartieTerminees());
                $view->setArg('enCours', AnonymousModel::getPartieEnCours());
		$view->render();

	}
	
	public function about(){
		$view = new AboutView($this,'about');
		$view->render();
	}
	
	public function connexion(){
		$view = new InscriptionView($this,'connexion');
		$view->render();
	}
	
	public function connected(){
		
		$login=$_POST['login'];
		$pwd=$_POST['password'];
		
		$ret=UserModel::tryLogin($login, $pwd);
		if($ret!=NULL){
		$view = new UserView($this,'Anonymous');
		$view->render();}
		else{
		$view = new InscriptionView($this,'connexionEchoue');
		$view->render();}

		}

}
