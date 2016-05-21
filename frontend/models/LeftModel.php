<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use yii\db\Command;
use Yii;

/**
 * Signup form
 */
class LeftModel extends Model
{

    /**
     * @inheritdoc
     */
    public function digui()
    {
    	$connection = \Yii::$app->db;
        $type=$command = $connection->createCommand('SELECT * FROM type')->queryAll();
        return $this->left($type,$parent_id=0);
    }
    public function left($type,$parent_id)
    {
    	$child=array();
    	foreach($type as $key=>$v){
    		
    		if($v['parent_id']==$parent_id){
    			$child[]=$v;
    		} 	
    	}
    	if(empty($child)){
    		return null;
    	}
    	foreach($child as $key=>$s){
    		$kk_id=$this->left($type,$s['t_id']);
    		if($kk_id){
    			$child[$key]['child']=$kk_id;
    		}
    	}
    	return $child;
    }
}
