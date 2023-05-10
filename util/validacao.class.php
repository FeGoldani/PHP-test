<?PHP
class Validacao{
		
		public static function testarNome($valor){
			$exp='/^[A-Za-z ]{3,50}$/';
			if(preg_match($exp,$valor)){
					return true;
			}else{
					return false;
			}//fecha else
		}//fecha método
		
			
}


?>