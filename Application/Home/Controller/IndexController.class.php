<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
//        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        $Data = M('Data');// 实例化Data数据模型
//        $result = $Data->find(1);
        $list = $Data->limit(10)->select();
        $this->assign('list',$list);
        $this->display();
    }
    public function create(){
        if(IS_POST){
            $Data = M('Data');
            if($Data->create()){
                $result = $Data->add();
                if($result) {
                    $this->success('数据添加成功!');
                    $this->redirect('/');
                }

                else{
                    $this->error('数据添加错误!'); }
            }
            else{
                $this->error($Data->getError());
            }
        }
        elseif(IS_GET){
            $this->display();
        }


    }

    public function read($id){
        $Data = M('Data');
// 读取数据
//        echo $id;
        $data = $Data->find($id);
        if($data) {
            $this->assign('data',$data);// 模板变量赋值
        }else{
            $this->error('数据错误'); }
        $this->display();
    }

    public function edit($id=0){
        $Data = M('Data');
        $this->assign('vo',$Data->find($id));
        $this->display();
    }
    public function update(){
        $Data = M('Data');
        if($Data->create()) {
            $result = $Data->save();
            if($result) {
                $this->success('操作成功!');
                $this->redirect('/');
            }
            else{
                $this->error('写入错误!'); }
        }
        else{ $this->error($Data->getError());
        } }

}