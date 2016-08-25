<?php
namespace app\modules\hosxpreport\controllers;
use yii\web\Controller;
use yii\data\ArrayDataProvider;
use Yii;
class ReportsController extends Controller{
    
    
    public function actionOpddiag(){
        $connection = Yii::$app->db2;
        $data = $connection->createCommand("select a.pdx
            ,i.name as icdname 
            ,count(a.pdx) as a
            from vn_stat a 
            left outer join icd101 i on i.code=a.main_pdx 
            where a.vstdate between '2013-10-01' and '2013-10-31' 
            and a.pdx<>'' and a.pdx is not null             
            group by a.pdx,i.name 
            order by a desc 
            limit 10")->queryAll();
        
       for ($i = 0; $i < sizeof($data); $i++) {
            $pdx[] = $data[$i]['pdx'];        
            $icdname[] = $data[$i]['icdname']; 
            $a[] = $data[$i]['a']*1; 
        }
        
        $dataProvider = new ArrayDataProvider([
                'allModels'=>$data, 
            ]);
        
        return $this->render('opddiag', [
            'dataProvider' => $dataProvider,
            'pdx'=>$pdx,
            'icdname'=>$icdname,
            'a'=>$a
        ]);
    }
}