<?php

$operation = $_REQUEST['operation'];

if (!isset($operation))
   return null;

$id = $_REQUEST['id'];
$text = $_REQUEST['text'];
$parent = $_REQUEST['parent'];
$type = $_REQUEST['type'];

function getIdNode($id) {
   return isset($id) && ($id !== '#') ? $id : '/';
}

function getIdText($text) {
   return isset($text) ? $text : '';
}

function getParent($parent) {
   return isset($parent) && $parent !== '#' ? $parent : '/';
}

$rslt = null;
$fs = new fs($url);
try {
   $node = getIdNode($id);
   switch ($operation) {
      case 'get_node':
         $rslt = $fs->lst($node, (isset($id) && $id === '#'));
         break;
      case "get_content":
         $rslt = $fs->data($node);
         break;
      case 'create_node':
         $rslt = $fs->create($node, getIdText($text), (!isset($type) || $type !== 'file'));
         break;
      case 'rename_node':
         $rslt = $fs->rename($node, getIdText($text));
         break;
      case 'delete_node':
         $rslt = $fs->remove($node);
         break;
      case 'move_node':
         $rslt = $fs->move($node, getParent($parent));
         break;
      case 'copy_node':
         $rslt = $fs->copy($node, getParent($parent));
         break;
      default:
         throw new Exception(_('Unsupported operation: ') . $operation);
         break;
   }
} catch (Exception $e) {
   $rslt = array(
       "server_protocol" => $_SERVER["SERVER_PROTOCOL"],
       "status" => "500 Server Error",
       "msg" => $e->getMessage());
}
header('Content-Type: application/json; charset=utf-8');
echo json_encode($rslt);
?>
