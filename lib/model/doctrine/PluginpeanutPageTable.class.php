<?php

/**
 * peanutPageTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class PluginpeanutPageTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return object peanutPageTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('peanutPage');
  }

  /**
   * Retrieves pages object.
   *
   * @param  string|int $item     The id or slug of item
   *
   * @return peanutPage
   */
  public function getItem($lang = null)
  {
    $p = $this->createQuery('p')
            ->leftJoin('p.Translation t')
            ->leftJoin('p.sfGuardUser s')
            ->leftJoin('p.peanutMenu m')
            ->leftJoin('p.peanutSeo o')
            ->orderBy('p.position ASC');
    
    if(null !== $lang)
    {
      $p->andWhere('t.lang = ?', $lang);
    }
    
    return $p;
  }

  /**
   * Retrieves pages object.
   *
   * @param  string|int $item     The id or slug of item
   *
   * @return peanutPage
   */
  public function showItem($item, $lang = null)
  {
    $p = $this->getItem($lang)
            ->andWhere('p.id = ? OR t.slug = ?', array($item, $item));

    return $p;
  }
  
  /**
   * Retrieves pages object.
   *
   * @param  string     $status   The status of items
   *
   * @return peanutPage
   */
  public function getItems($status = 'publish', $lang = null)
  {
    $p = $this->getItem($lang)
            ->andWhere('p.status = ?', $status);;

    return $p;
  }

  /**
   * Retrieves pages object by menu.
   *
   * @param  string|int $menu     The id or slug of menu
   *
   * @return peanutPage
   */
  public function getItemsByMenu($menu, $status = 'publish', $lang = null)
  {
    $p = $this->getItems($status, $lang)
            ->andWhere('m.id = ? OR m.slug = ?', array($menu, $menu));

    return $p;
  }

  /**
   * Retrieves pages object by author.
   *
   * @param  string|int $author   The id or username of author
   * @param  string     $status   The status of page
   *
   * @return peanutPage
   */
  public function getItemsByAuthor($author, $status = 'publish', $lang = null)
  {
    $p = $this->getItems($status)
            ->andWhere('s.id = ? OR s.username = ?', array($author, $author));

    return $p;
  }
}