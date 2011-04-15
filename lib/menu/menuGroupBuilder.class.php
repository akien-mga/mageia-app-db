<?php
abstract class menuGroupBuilder
{

  private $menuGroup = null;
  private $menuGroupFactory = null;
  private $menuItemFactory = null;
  private $sfUser = null;
  private $request = null;

  public function __construct(sfUser $user)
  {
    $this->menuGroup = new menuGroup();
    $this->build();
  }

  public function getMenuGroup()
  {
    return $this->menuGroup;
  }

  abstract protected function build();

  protected function isUserAuthenticated()
  {
    return false; //TODO
  }

  protected function createItem($name, $internalUri = null, array $options = array())
  {
    return new menuItem($name, $internalUri, $options);
  }

  protected function addItem(menuItem $item)
  {
    $this->menuGroup->addMenuItem($item);
  }

  protected function addGroup($name, array $values)
  {
    $group = new menuGroup($name);
    foreach ($values as $value)
    {
      $group->append($value);
    }
    $this->menuGroup->addMenuGroup($group);
  }
}
