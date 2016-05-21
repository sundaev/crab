
<?php
class SiteController extends Controller
{
    public function index()
    {
        $hello = 'hello world';
        
        $this->assign('hello', $hello);
        $this->display();
    }

    public function dataTable()
    {
        $this->display();
    }

    /**
     * datatable 异步调用
     * @return [json] json数组
     * @author pangxieke
     * @date   2016-05-10
     */
    public function ajaxTable()
    {
        $start = $_GET['start']; //显示的起始索引
        $length = $_GET['length'];//显示的行数

        //搜索条件
        $status = $_GET['status'];
        $where = ['status'=>$status];

        $res = [];
        $aaData = [];
        for($i=0; $i<=20; $i++){
            $res[] = [
                $i,
                'username',
                'tousername',
                time(),
                'status'
            ];
        }
        $aaData = array_slice($res, $start, $length);

        $data = [];
        $data['sEcho'] = isset($_GET['sEcho']) ? $_GET['sEcho'] : 0;
        $data['iTotalDisplayRecords'] = count($res);
        $data['iTotalRecords'] = count($res);
        $data['aaData'] = $aaData;
        $data['iDisplayLength'] = $length;
        echo json_encode($data);
    }

    public function hello()
    {
        echo 'hello world!';
    }
}