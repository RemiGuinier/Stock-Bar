<?php



class AdminUserView extends View{
	
	
	
	protected $args;
	protected $templateName;

	public function __construct($controller, $templateName,$args = array()) {
		
		
		$templateName='adminUser';
		
		$this->templateNames = array();
		$this->templateNames['head'] = 'head';
		$this->templateNames['top'] = 'top';
		$this->templateNames['menu'] = 'menu';
		$this->templateNames['foot'] = 'foot';
		$this->templateNames['content'] = $templateName;
		$this->args = $args;
		$this->args['controller'] = $controller;
		
	}
	
	public function setArg($key, $val) {
		
		$this->args[$key] = $val;
	}
	
	public function createTabPseudo($sth){
		if(count($sth) > 1) 
		{ 
			echo '<table class="table" id="usersTable"><thead>'; 
			
			echo '<tr><th>', implode('</th><th>', array("PSEUDO", "LOGIN", "MOT DE PASSE", "EMAIL", "DATE D'INSCRIPTION", "DATE DE DERNIERE CONNEXION")), '</th></tr></thead></tbody>'; 
			
			for ($i = 0; $i < count($sth)-1; $i++) {
				echo '<tr><td>', implode('</td><td>', array($sth[$i]->PSEUDO,$sth[$i]->LOGIN, $sth[$i]->PASSWORD,$sth[$i]->EMAIL, $sth[$i]->DATE_D_INSCRIPTION,$sth[$i]->DATE_DE_DERNIERE_CONNEXION)), '</td></tr>'; 
			}
			
			echo '</table>'; 
		} 
		
	}
	
	public function render(){
		
		$this->loadTemplate($this->templateNames['head'], $this->args);
		$this->loadTemplate($this->templateNames['menu'], $this->args);
		//$this->loadTemplate($this->templateNames['top'], $this->args); On ne charge pas la bannière
		$this->loadTemplate($this->templateNames['content'], $this->args);
		$this->createTabPseudo($this->args);
		$this->loadTemplate($this->templateNames['foot'], $this->args);
	}

	public function loadTemplate($name,$args=NULL) {
		
		$templateFileName =__ROOT_DIR.'/templates/'. $name . '.Template.php'; 
		//echo $templateFileName."\n";
		if(is_readable($templateFileName)) {
			if(isset($args))
			foreach($args as $key => $value)
			$$key = $value;
			require_once($templateFileName);
		}
		
		else
		throw new Exception('undefined template "' . $name .'"');
	}
}

