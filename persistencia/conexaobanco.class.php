<?PHP
class ConexaoBanco extends PDO{
	private static $instancia = null;
	
	public function ConexaoBanco($dsn,$usuario,$senha){
		//construtor da classe pai PDO
		parent::__construct($dsn,$usuario,$senha);
	}
	public static function getInstancia(){
		if(!isset(self::$instancia)){
			try{
				//cria e retorna uma nova conexão
				self::$instancia = new
				ConexaoBanco("mysql:dbname=dupla04;host=localhost","root","fl02");				
			}catch(Exception $e){
				echo "Erro ao conectar!";
				exit();
			}//fecha catch
		}//fecha if
		return self::$instancia;
	}//fecha método
}//fecha class
?>