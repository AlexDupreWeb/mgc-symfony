<?php

namespace AppBundle\Utils;

class Pagination
{
    private $url;
    private $param_page_url;
    private $params_url;
    private $current_page;
    private $previous_page;
    private $next_page;
    private $number_pages;

    public function __construct($url)
    {
        $this->url = $url;

        $this->param_page_url = "page";
        $this->params_url = '';

        $this->current_page = 1;
        $this->previous_page = 1;
        $this->next_page = 1;

        $this->number_pages = 1;
    }

    /**
     * @return array
     */
    public function create($adj=3)
    {
        $tab_url = array();

        //Previous page
        $this->previous_page--;

        if($this->previous_page < 1) $this->previous_page = 1;

        if($this->current_page == $this->previous_page){
            $tab_url[] = array(
                'url' => $this->generateUrl($this->previous_page),
                'libelle' => "&laquo;",
                'class' => 'disabled'
            );
        }else{
            $tab_url[] = array(
                'url' => $this->generateUrl($this->previous_page),
                'libelle' => "&laquo;",
                'class' => ''
            );
        }

        //All other pages

        //CASE 1 : 10 pages or less -> no troncat
        if ($this->number_pages < 7 + ($adj * 2)) {

            for ($i=1; $i<=$this->number_pages; $i++) {
                if($this->current_page == $i){
                    $tab_url[] = array(
                        'url' => $this->generateUrl($i),
                        'libelle' => $i,
                        'class' => 'active'
                    );
                }else{
                    $tab_url[] = array(
                        'url' => $this->generateUrl($i),
                        'libelle' => $i,
                        'class' => ''
                    );
                }
            }

        }
        //CASE 2 : 11 pages or more -> troncat
        else {

            //Troncat 1 : near the first pages -> troncat at the end. ( 1 2 3 4 5 6 7 8 9 … 16 17 )
            if ($this->current_page < 2 + ($adj * 2)) {
                for ($i = 1; $i < 4 + ($adj * 2); $i++) {
                    if($this->current_page == $i){
                        $tab_url[] = array(
                            'url' => $this->generateUrl($i),
                            'libelle' => $i,
                            'class' => 'active'
                        );
                    }else{
                        $tab_url[] = array(
                            'url' => $this->generateUrl($i),
                            'libelle' => $i,
                            'class' => ''
                        );
                    }
                }

                $tab_url[] = array('url' => '#','libelle' => '...','class' => '');
                $tab_url[] = array('url' => $this->generateUrl($this->number_pages-1),'libelle' => ($this->number_pages-1),'class' => '');
                $tab_url[] = array('url' => $this->generateUrl($this->number_pages),'libelle' => $this->number_pages,'class' => '');
            }
            //Troncat 2 : near to the middle pages -> troncar at the begin and at the end. ( 1 2 … 5 6 7 8 9 10 11 … 16 17 )
            elseif ( (($adj * 2) + 1 < $this->current_page) && ($this->current_page < $this->number_pages - ($adj * 2)) ) {
                $tab_url[] = array('url' => $this->generateUrl('1'),'libelle' => '1','class' => '');
                $tab_url[] = array('url' => $this->generateUrl('2'),'libelle' => '2','class' => '');
                $tab_url[] = array('url' => '#','libelle' => '...','class' => '');

                for ($i = $this->current_page - $adj; $i <= $this->current_page + $adj; $i++) {
                    if($this->current_page == $i){
                        $tab_url[] = array(
                            'url' => $this->generateUrl($i),
                            'libelle' => $i,
                            'class' => 'active'
                        );
                    }else{
                        $tab_url[] = array(
                            'url' => $this->generateUrl($i),
                            'libelle' => $i,
                            'class' => ''
                        );
                    }
                }

                $tab_url[] = array('url' => '#','libelle' => '...','class' => '');
                $tab_url[] = array('url' => $this->generateUrl($this->number_pages-1),'libelle' => ($this->number_pages-1),'class' => '');
                $tab_url[] = array('url' => $this->generateUrl($this->number_pages),'libelle' => $this->number_pages,'class' => '');
            }
            //Troncat 3 : near the last pages -> troncat at the begin. ( 1 2 … 9 10 11 12 13 14 15 16 17 )
            else {
                $tab_url[] = array('url' => $this->generateUrl('1'),'libelle' => '1','class' => '');
                $tab_url[] = array('url' => $this->generateUrl('2'),'libelle' => '2','class' => '');
                $tab_url[] = array('url' => '#','libelle' => '...','class' => '');

                for ($i = $this->number_pages - (2 + ($adj * 2)); $i <= $this->number_pages; $i++) {
                    if($this->current_page == $i){
                        $tab_url[] = array(
                            'url' => $this->generateUrl($i),
                            'libelle' => $i,
                            'class' => 'active'
                        );
                    }else{
                        $tab_url[] = array(
                            'url' => $this->generateUrl($i),
                            'libelle' => $i,
                            'class' => ''
                        );
                    }
                }
            }

        }

        //Next page
        $this->next_page++;
        if($this->next_page > $this->number_pages) $this->next_page = $this->number_pages;

        if($this->current_page == $this->next_page){
            $tab_url[] = array(
                'url' => $this->generateUrl($this->next_page),
                'libelle' => '&raquo;',
                'class' => 'disabled'
            );
        }else{
            $tab_url[] = array(
                'url' => $this->generateUrl($this->next_page),
                'libelle' => '&raquo;',
                'class' => ''
            );
        }

        return $tab_url;

    }

    /**
     * @return string
     */
    private function generateUrl($number){
        $url = $this->url;

        if(!empty($this->params_url)){
            $url .= '?'.$this->params_url;
            $url .= '&'.$this->param_page_url;
        }else{
            $url .= '?'.$this->param_page_url;
        }

        if(substr($url, -1) != '='){
            $url .= '='.$number;
        }else{
            $url .= $number;
        }

        return $url;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getParamPageUrl()
    {
        return $this->param_page_url;
    }

    /**
     * @param string $param_page_url
     */
    public function setParamPageUrl($param_page_url)
    {
        $this->param_page_url = $param_page_url;
    }

    /**
     * @return string
     */
    public function getParamsUrl()
    {
        return $this->params_url;
    }

    /**
     * @param string $params_url
     */
    public function setParamsUrl($params_url)
    {
        $this->params_url = $params_url;
    }

    /**
     * @return int
     */
    public function getCurrentPage()
    {
        return $this->current_page;
    }

    /**
     * @param int $current_page
     */
    public function setCurrentPage($current_page)
    {
        $this->current_page = $current_page;
    }

    /**
     * @return int
     */
    public function getPreviousPage()
    {
        return $this->previous_page;
    }

    /**
     * @param int $previous_page
     */
    public function setPreviousPage($previous_page)
    {
        $this->previous_page = $previous_page;
    }

    /**
     * @return int
     */
    public function getNextPage()
    {
        return $this->next_page;
    }

    /**
     * @param int $next_page
     */
    public function setNextPage($next_page)
    {
        $this->next_page = $next_page;
    }

    /**
     * @return int
     */
    public function getNumberPages()
    {
        return $this->number_pages;
    }

    /**
     * @param int $number_pages
     */
    public function setNumberPages($number_pages)
    {
        $this->number_pages = $number_pages;
    }

    /**
     * @return mixed
     */
    public function debug($number=3){
        echo '<pre>';
        var_dump($this->create($number));
        echo '</pre>';
    }

}

/*
$pagination = array(
    'url' => 'index.php?',
    'url_param_page' => 'page=',
    'limit1' => 0,
    'limit2' => 100,
    'current_page' => isset($_REQUEST['page']) && !empty($_REQUEST['page']) ? $_REQUEST['page']:1,
    'prev_page' => isset($_REQUEST['page']) && !empty($_REQUEST['page']) ? $_REQUEST['page']:1,
    'next_page' => isset($_REQUEST['page']) && !empty($_REQUEST['page']) ? $_REQUEST['page']:1,
    'nb_pages' => 1,
);
$limit1 = $pagination['limit1'] = ($pagination['limit2']*$pagination['current_page'])-$pagination['limit2'];
$limit2 = $pagination['limit2'];

$pagination['nb_pages'] = ceil($annonceurs['nb']/$pagination['limit2']);
$smarty->assign('pagination', pagination($pagination, 2));
*/