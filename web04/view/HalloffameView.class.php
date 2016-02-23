<?php



class HalloffameView extends View{
	
	
	
	protected $args;
	protected $templateName;

	public function __construct($controller, $templateName,$args = array()) {
		
		
		$templateName='halloffame';
		
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
	
	public function createTabPseudo($sth){
			if(count($sth) > 1) 
		{ 
			echo '<table class="table"><thead>'; 
			
			echo '<tr><th>', implode('</th><th>', array("Nom","Score")), '</th></tr></thead></tbody>'; 
			
			for ($i = 0; $i < count($sth)-3; $i++) {
				echo '<tr><td>',implode('</td><td>', array($sth[$i]->PSEUDO,$sth[$i]->SCORE)), '</td></tr>'; 
			}
			
			echo '</table>'; 
		} 
	
	}
        public function terminee(){
            echo "Nombre de parties terminees: ";
            echo $this->args['terminee'][0]->resTermine;
            echo "\n";
    }
        public function enCours(){
            echo "Nombre de parties en cours ";
            echo $this->args['enCours'][0]->resEnCours;
        }
	
	public function render(){
		$this->loadTemplate($this->templateNames['head'], $this->args);
		$this->loadTemplate($this->templateNames['menu'], $this->args);
		//$this->loadTemplate($this->templateNames['top'], $this->args); On ne charge pas la bannière
		$this->loadTemplate($this->templateNames['content'], $this->args);
		$this->createTabPseudo($this->args);
                $this->terminee();
                $this->enCours();
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

