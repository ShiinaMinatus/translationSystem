<?php

class page{


	private $pagesize = 1; //分页尺寸  10条数据 分一爷庙

	private $pageCount; //总数量

	private $page = 1; //当前页数

	private $url;  //url地址

	private $init = 1;

	private $page_len=8;

	private $str = '';

    public $array;

	/**
	 * $model  commodity/list   page 1  
	 */
 	
 	public function page($model,$page,$modelName){

 		$this->url = WebSiteUrl.'/'.$model;

 		$this->page = $page;

        $result = new $modelName();

        $dateCount = $this->pagesize * ($page - 1);

        $result->initialize();

 		$this->pageCount = $result->vars_number;

        $result->addOffset($dateCount, $this->pagesize);
        
        $result->initialize();

        $this->array = $result->vars_all;

 	}

	public function getPages() {
        
        $page_count = $maxPage = $pages = ceil($this->pageCount / $this->pagesize);

        if (empty($this->page) || $this->page < 0) {  //判断传送的页码

            $this->page = 1;
        } 
        $offset = $this->pagesize * ($this->page - 1);

        $page_len = ($this->page_len % 2) ? $this->page_len : $this->page_len + 1; //页码个数

        $pageoffset = ($page_len - 1) / 2; //页码个数左右偏移量

        $key1 = '<ul class="pagination pagination-sm">';

        if ($this->page != 1) {

            $key1.="<li class='usablePage'><a href=\"" . $this->url . "?page=" . ($page - 1) . "\">&laquo;</a></li>"; //上一页

        } else {

            $key1.="<li  class='disabled'><a>&laquo;</a></li>"; //上一页

        }

        if ($pages > $page_len) {//如果当前页小于等于左偏移
            if ($page <= $pageoffset) {
                $this->init = 1;
                $maxPage = $page_len;
            } else {//如果当前页大于左偏移/如果当前页码右偏移超出最大分页数
                if ($page + $pageoffset >= $pages + 1) {
                    $this->init = $pages - $page_len + 1;
                } else {//左右偏移都存在时的计算
                    $this->init = $page - $pageoffset;
                    $maxPage = $page + $pageoffset;
                }
            }
        }
        for ($i = $this->init; $i <= $maxPage; $i++) {
            if ($i == $this->page) {

                $key1.=' <li class="active"><span>' . $i . '</span></li>';

            } else {

            	$key1.=" <li class='usablePage'><a disabled href=\"" . $this->url . "?page=" . $i .  "\">" . $i . "</a></li>";
                
            }
        }

        if ($this->page != $pages) {
           
            $key1.=" <li class='usablePage'><a  href=" . $this->url . "?page=" . ($this->page + 1) .  ">&raquo;</a></li>"; //下一页
          
        } else {
            $key1.="<li class='disabled'><a>&raquo;</a></li> "; //下一页
            //  $key1.="&nbsp;&nbsp;最后一页"; //最后一页
        }
        $key1.='</ul>';
        return $key1;
    }


}
?>