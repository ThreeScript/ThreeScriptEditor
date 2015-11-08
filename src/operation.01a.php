<?php

$operation = $_GET['operation'];
$id = $_GET['id'];
$text = $_GET['text'];
$parent = $_GET['parent'];
$type = $_GET['type'];

function getIdNode($id) {
   return isset($id) && ($id !== '#') ? $id : '/';
}

function getParent($parent) {
   return isset($parent) && $parent !== '#' ? $parent : '/';
}

if (isset($operation)) {
   $fs = new fs($url);
   try {
      $rslt = null;
      $node = getIdNode($id);
      switch ($operation) {
         case 'get_node':
            $rslt = $fs->lst($node, (isset($id) && $id === '#'));
            break;
         case "get_content":
            $rslt = $fs->data($node);
            break;
         case 'create_node':
            $rslt = $fs->create($node, isset($text) ? $text : '', (!isset($type) || $type !== 'file'));
            break;
         case 'rename_node':
            $rslt = $fs->rename($node, isset($text) ? $text : '');
            break;
         case 'delete_node':
            $rslt = $fs->remove($node);
            break;
         case 'move_node':
            $parn = getParent($parent);
            $rslt = $fs->move($node, $parn);
            break;
         case 'copy_node':
            $parn = getParent($parent);
            $rslt = $fs->copy($node, $parn);
            break;
         default:
            throw new Exception('Unsupported operation: ' . $operation);
            break;
      }
      header('Content-Type: application/json; charset=utf-8');
      echo json_encode($rslt);
   } catch (Exception $e) {
      header($_SERVER["SERVER_PROTOCOL"] . ' 500 Server Error');
      header('Status:  500 Server Error');
      echo $e->getMessage();
   }
   die();
}
?>
