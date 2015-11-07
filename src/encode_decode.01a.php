

<?php

// http://forum.imasters.com.br/topic/264864-codifica-decodifica-parametros-de-url/

/**
 * -------------- EXPERIMENTAL -------------- 
 * Codifica / Decodifica parametros de URL
 *
 * O objetivo dessa classe é aumentar a segurança na passagem de 
 * parametros de URL ($_GET), codificando todos os parametros.
 * 
 * 
 * --
 * include: md5_encript(), md5_decript(), get_rnd_iv();
 * URL: [url="http://br2.php.net/manual/pt_BR/function.md5.php#43696"]http://br2.php.net/manual/pt_BR/function.md5.php#43696[/url]
 * --
 *  
 * Utilizando:
 * 	- Decodicando: 
 * 		- No inicio de cada página, chamar a função <?php URL::decode(); ?> para a decodificar os parametros de URL
 * 	- Codificando:
 * 		- <a href="pagina.php?<?php echo URL::encode('?param1=1&param2=2'); ?>">String</a>
 * 
 * 
 * @author Douglas Brito de Medeiros <douglas.web@gmail.com>
 * @version 0.1 
 * @access public  
 */
class URL {

   /**
    * Chave de codificação/decodificação
    * @access private
    * @name $key 
    */
   private static $key = '123456789abcd';

   /**
    * Tamanho da string 
    * @access private
    * @name $key 
    */
   private static $size = 16;

   /**
    * Codifica 
    * @access static
    * @param String $string
    * @return string 
    * 
    * URL::encode('param1=1&param2=2')
    * 
    */
   static function encode($string) {
      $string = gzcompress($string) . "\x13";
      $n = strlen($string);

      if ($n % 16) {
         $string .= str_repeat("\0", 16 - ($n % 16));
      }

      $i = 0;
      $enc_text = self::randomize();
      $iv = substr(self::$key ^ $enc_text, 0, 512);

      while ($i < $n) {
         $block = substr($string, $i, 16) ^ pack('H*', md5($iv));
         $enc_text .= $block;
         $iv = substr($block . $iv, 0, 512) ^ self::$key;
         $i += 16;
      }

      return urlencode(base64_encode(base64_encode($enc_text)));
   }

   /**
    * Decodifica 
    * @access static
    * @return void
    * 
    * URL::decode()
    *  
    */
   static function decode() {
      $string = $_SERVER['QUERY_STRING'];

      if (strlen($string) > 0) {
         $string = base64_decode(base64_decode($string));
         $n = strlen($string);
         $i = self::$size;
         $plain_text = '';
         $iv = substr(self::$key ^ substr($string, 0, self::$size), 0, 512);

         while ($i < $n) {
            $block = substr($string, $i, 16);
            $plain_text .= $block ^ pack('H*', md5($iv));
            $iv = substr($block . $iv, 0, 512) ^ self::$key;
            $i += 16;
         }

         $plain_text = @gzuncompress(preg_replace('/\\x13\\x00*$/', '', $plain_text));

         if (!$plain_text) {
            exit("A URL informada é inválida!");
         }

         $url = parse_url(urldecode($plain_text));
         $parametros = explode("&", $url['query']);

         for ($i = 0; $i < count($parametros); $i++) {
            $valor = explode("=", trim(urldecode(strip_tags($parametros[$i]))));
            $_GET[$valor[0]] = $valor[1];
         }

         unset($_GET[urldecode($_SERVER['QUERY_STRING'])]);
      }
   }

   /**
    * Gera uma string randomica
    * @access static
    * @return string
    * 
    * URL::randomize()
    *  
    */
   private static function randomize() {
      $iv = '';
      $i = 0;
      while ($i < self::$size) {
         $iv .= chr(mt_rand() & 0xff);
         $i++;
      }
      return $iv;
   }

}
?>


<?php
require_once('url.class.php');
URL::decode();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
      <title>Codifica / Decodifica</title>
   </head>
   <body>
      <p>
         <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?<?php echo URL::encode('?param1=1&param2=2&ajsdajsd=adshgads'); ?>">
            Envia URL - <strong>?param1=1&param2=2</strong>
         </a>

      <hr>

      <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?<?php echo URL::encode('?param3=1abcde&param3=eeeee'); ?>">
         Envia URL - <strong>?param3=1abcde&param3=eeeee</strong>
      </a>
   </p>

   <p>--------------------------------------------------</p>  
   <?php
   foreach ($_GET as $nome => $valor) {
      printf("<p><strong>\$_GET['%s']</strong> = %s</p>", $nome, $valor);
   }
   ?>
</body>
</html>