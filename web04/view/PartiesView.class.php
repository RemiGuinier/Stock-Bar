<?php



class PartiesView extends View{
	
	
	
	protected $args;
	protected $templateName;

	public function __construct($controller, $templateName,$args = array()) {
		
		
		$templateName='parties';
		
		$this->templateNames = array();
		$this->templateNames['head'] = 'head';
		$this->templateNames['top'] = 'top';
		$this->templateNames['menu'] = 'menuAnonymous';
		$this->templateNames['foot'] = 'foot';
		$this->templateNames['content'] = $templateName;
		$this->args = $args;
		$this->args['controller'] = $controller;
		
	}
	
	public function setArg($key, $val) {
		
		$this->args[$key] = $val;
	}
	
	public function render(){
		
		$this->loadTemplate($this->templateNames['head'], $this->args);
		$this->loadTemplate($this->templateNames['menu'], $this->args);
		//$this->loadTemplate($this->templateNames['top'], $this->args); On ne charge pas la bannière
		$this->loadTemplate($this->templateNames['content'], $this->args);
		$this->loadTemplate($this->templateNames['foot'], $this->args);
	}
	
		public function createTabPseudo($sth){
		
		if(count($sth) > 0) 
		{ 
			echo '<table class="table"><thead>'; 
			
			echo '<tr><th>', implode('</th><th>', array("Numéro de Partie","Créateur de la Partie", "Nombre de Joueurs", "Date de création", "Partie en cours", 
			"Partie terminée")), '</th></tr></thead></tbody>'; 
			
			for ($i = 0; $i < count($sth); $i++) {
				echo '<tr><td>', implode('</td><td>', $sth[$i]->proprietes), '</td></tr>'; 
			}
			
			echo '</table>'; 
		} 
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

