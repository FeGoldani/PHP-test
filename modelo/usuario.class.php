<?PHP
class Usuario{
		//Atributo
		private $nome;
		private $tel;
		private $email;
		private $tipo;
		
		//construtor
		public function __construct(){
			
		}
		public function Usuario(){
			
		}
		public function __get($atrib){
				return $this->$atrib;
		}
		public function __set($atrib,$valor){
				$this->$atrib=$valor;
		}
		public function __toString(){
				return '<br> Nome: '.$this->nome.
					   '<br> Telefone: '.$this->tel.
					   '<br> Email: '.$this->email.
					   '<br> Profissão: '.$this->tipo;
		}//fecha toString
}//fecha class
?>