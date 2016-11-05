<?php

namespace MGC\AdminBundle\Services\Users;

use Doctrine\ORM\EntityManager;
use MGC\AdminBundle\Entity\User;
use Symfony\Component\Asset\Packages;
use Symfony\Component\DependencyInjection\Container;

class AvatarService
{
    const DEFAULT_MAN_AVATAR_FILENAME = '_default_man.png';
    const DEFAULT_WOMAN_AVATAR_FILENAME = '_default_woman.png';

    /**
     * @var Container
     */
    protected $container;

    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @var Packages
     */
    protected $twigService;

    /**
     * @var string
     */
    protected $avatarsFolderPath;

    /**
     * @var string
     */
    protected $avatarsAssetsPath;

    public function __construct(Container $container, EntityManager $entityManager, Packages $twigService)
    {
        $this->container = $container;
        $this->entityManager = $entityManager;
        $this->twigService = $twigService;
        
        $this->avatarsFolderPath = $this->container->getParameter('kernel.root_dir');
        $this->avatarsFolderPath .= '/../web/';
        $this->avatarsFolderPath .= $this->container->getParameter('avatarsFolder');

        $this->avatarsAssetsPath = $this->container->getParameter('avatarsFolder');
    }

    public function setUserAvatarAssets(User $user)
    {
        $userTmp = $user;
        $userTmp->setAvatarPath($this->avatarsFolderPath.$userTmp->getAvatar());
        $userTmp->setAvatarAssetsPath($this->avatarsAssetsPath.$userTmp->getAvatar());

        //dump($this->avatarsFolderPath);die();

        if (empty($userTmp->getAvatar()) || !file_exists($userTmp->getAvatarPath()))
        {
            if ($userTmp->getGender() == 'female') {
                $userTmp->setAvatar(self::DEFAULT_WOMAN_AVATAR_FILENAME);
            } else {
                $userTmp->setAvatar(self::DEFAULT_MAN_AVATAR_FILENAME);
            }

            $userTmp->setAvatarPath($this->avatarsFolderPath.$userTmp->getAvatar());
            $userTmp->setAvatarAssetsPath($this->avatarsAssetsPath.$userTmp->getAvatar());
        }

        return $userTmp;
    }

    public function setUserAvatarAssetsFromArray($array)
    {
        $arrayTmp = $array;
        for ($i=0, $c = count($array); $i<$c; $i++)
        {
            if($array[$i])
            {
                $array[$i] = $this->setUserAvatarAssets($array[$i]);
            }
        }

        return $array;
    }

    public function setUserAvatarAssetsForUserSession()
    {
        $userSession = $this->container->get('security.token_storage')->getToken()->getUser();
        $userSession = $this->setUserAvatarAssets($userSession);
    }

}