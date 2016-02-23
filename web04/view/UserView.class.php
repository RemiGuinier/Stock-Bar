<?php



class UserView extends View{
	
	
	
	protected $args;
	protected $templateName;

	public function __construct($controller, $templateName,$args = array()) {
		
		
		$templateName='contentAnonymous';
		
		$this->templateNames = array();
		$this->templateNames['head'] = 'head';
		$this->templateNames['top'] = 'top';
		$this->templateNames['menu'] = 'menu';
		$this->templateNames['foot'] = 'foot';
		$this->templateNames['bienvenue']='contenuUser';
		$this->templateNames['content'] = $templateName;
		$this->args = $args;
		$this->args['controller'] = $controller;
		
	}
	
	public function render() {
		
		$this->loadTemplate($this->templateNames['head'], $this->args);
		$this->loadTemplate($this->templateNames['menu'], $this->args);
		$this->loadTemplate($this->templateNames['bienvenue'], $this->args);
		$this->loadTemplate($this->templateNames['top'], $this->args);
		$this->loadTemplate($this->templateNames['content'], $this->args);
		$this->loadTemplate($this->templateNames['foot'], $this->args);
	}
	
	public function setArg($key, $val) {
		
		$this->args[$key] = $val;
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

