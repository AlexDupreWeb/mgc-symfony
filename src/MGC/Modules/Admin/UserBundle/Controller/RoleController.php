<?php

namespace MGC\Modules\Admin\UserBundle\Controller;

use MGC\Modules\Admin\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\Request;

class RoleController extends Controller
{
    
    private $filtersFields = array(
        'id'=>'id','name'=>'name','ucount'=>'user_counter','active'=>'active'
    );
    
    /**
     * @Route("/admin/roles/", name="admin-mgc-roles")
     */
    public function indexAction(Request $request)
    {
        $limit = 25;

        $order = !empty($request->query->get('o')) ? $request->query->get('o'):'id;asc';
        $order = explode(';', $order);
        $order = array_slice($order, 0, 2);

        $page = !empty($request->query->get('p')) ? $request->query->get('p'):0;

        $search = !empty($request->query->get('s')) ? $request->query->get('s'):'';
        if(is_array($search)){
            $search = array_filter($search, function($var){
                return (!in_array($var, array('', null)));
            });
        }else{
            $search = array();
        }

        //$search = preg_replace(array_keys($this->filtersFields), array_values($this->filtersFields), $search);
        //var_dump($search);

        //$roles = $this->getDoctrine()->getRepository('UserBundle:Role')->findBy($search, $order, $limit, $page);
        $queryBuilder = $this->getDoctrine()->getRepository("UserBundle:Role")->createQueryBuilder('r');

        $queryBuilder->where('1=1');

        if(isset($search['id']) && !empty($search['id'])){
            $queryBuilder->andWhere('r.id = :id');
            $queryBuilder->setParameter('id', $search['id']);
        }
        if(isset($search['name']) && !empty($search['name'])){
            $queryBuilder->andWhere('r.name LIKE :name');
            $queryBuilder->setParameter('name', '%'.$search['name'].'%');
        }
        if(isset($search['active']) && (!empty($search['active']) || $search['active'] == 0)){
            $queryBuilder->andWhere('r.active = :active');
            $queryBuilder->setParameter('active', $search['active']);

        }

        $queryBuilder->orderBy("r.".$order[0], $order[1]);

        $queryBuilder->setFirstResult($page);
        $queryBuilder->setMaxResults($limit);

        $roles = $queryBuilder->getQuery()->getResult();

        return $this->render('UserBundle:Role:index.html.twig', array(
            'roles' => $roles,
        ));
    }

    /**
     * @Route("/admin/roles/add", name="admin-mgc-roles-add")
     */
    public function addAction()
    {
        return $this->render('UserBundle:Role:add.html.twig');
    }
}
