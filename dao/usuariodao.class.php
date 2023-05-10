<?PHP
include '../persistencia/conexaobanco.class.php';
class UsuarioDAO{
	
		private $conexao = null;
		
		public function __construct(){
			/*Buscando uma instancia de
			banco na classe 
			conexaobanco.class */
			$this->conexao = ConexaoBanco::getInstancia();
		}//fecha construtor
		
		//Método Cadastrar
		public function CadastrarUsuario($u){
			try{
$stat=$this->conexao->prepare("insert into usuario(nome,tel,email,tipo)values(?,?,?,?)");
			$stat->bindvalue(1,$u->nome);
			$stat->bindvalue(2,$u->tel);				
			$stat->bindvalue(3,$u->email);
			$stat->bindvalue(4,$u->tipo);			
			
			$stat->execute();
			
			//encerramento da conexão
			$this->conexao = null;
			}catch(PDOException $e){
				echo 'Erro ao cadastrar usuário!';
			}//fecha catch
		}//fecha cadastrar
		
		public function buscarUsuarios(){
			try{
			$stat = $this->conexao->query("select * from usuario");
			$array = array();
			$array = $stat->fetchAll(PDO::FETCH_CLASS,'Usuario');
			$this->conexao = null;
			return $array;
			}catch(PDOException $e){
				echo'Erro ao buscar usuários!'.$e;
			}//fecha catch
		}//fecha buscar usuários
		
		//método deletarUsuario
		public function deletarUsuario($email){
			try{
				$stat=$this->conexao->prepare("delete from usuario where email =?");
				$stat->bindvalue(1,$email);
				$stat->execute();
				
				$this->conexao = null;
			}catch(PDOException $e){
				echo 'Erro ao deletar usuário!';
				}//fecha catch
		}//fecha deletar usuário
}//fecha classe


?>