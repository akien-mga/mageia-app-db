<?php $madbConfig = new madbConfig(); ?>
<div id="intro" class="links">
  <div class="content_group">Welcome to <?php echo $madbConfig->get('name')?></div>

  <p>This is a work in progress lacking many features, but you can already search and browse packages. Use the search form, browse by category or use the left menu.</p>
  <p>There are persistent navigation filters, which you can change at any time from the filter banner : distribution release, show only applications or all packages, media, arch, etc.</p>
  <p>Click <a href="http://madb.org">here</a> for more information about this project.</p>
</div>

<div id="groups" class="links">
  <div class="content_group">Groups</div>
  <table width="100%">
  <?php $cpt = 0 ?>
  <?php foreach ($groups as $values): ?>
    <?php if ($cpt == 0): ?>
      <tr>
    <?php endif; ?>
      <td>
      <?php $exploded_name = explode('/', $values['the_name']); ?>
      <?php $name          = $exploded_name[count($exploded_name)-1]; ?>
      <?php echo link_to(
              $name, 
              $madburl->urlFor('group/list', 
                $madbcontext, 
                 array( 
                   'extra_parameters' => array(
                      't_group'    => implode(',', RpmGroupPeer::getChildGroupsFor($values['the_name'], true)),
                      'level'      =>  1 + 1,
                      'group_name' => str_replace('/', '|', $values['the_name'])
                   )
                 )
              )
            ); ?>
      </td>
    <?php if ($cpt == $madbConfig->get('homepage_groups_line')): ?>
      </tr>
    <?php endif; ?>
    <?php $cpt++ ?>
    <?php if ($cpt == $madbConfig->get('homepage_groups_line')): ?>
      <?php $cpt = 0; ?>
    <?php endif; ?>
  <?php endforeach; ?>
  </table>
</div>

<?php if ($has_updates) : ?>
<div id="updates">
  <div class="content_group">Latest updates</div>
  <?php include_component('rpm', 'list', array(
    'listtype'       => 'updates',
    'page'           => 1,
    'showpager'      => false,
    'display_header' => false,
    'limit'          => $madbConfig->get('homepage_rpm_limit'),
    'short'          => true,
  )) ?>
  <br/>
  <?php echo link_to(
          "More updates...", 
          $madburl->urlFor('rpm/list', 
            $madbcontext, 
             array( 
               'extra_parameters' => array(
                  'listtype' => 'updates'
               )
             )
          )
        ); ?>
</div>
<?php endif; ?>

<?php if ($has_backports) : ?>
<div id="backports">
  <div class="content_group">Latest backports</div>
  <?php include_component('rpm', 'list', array(
    'listtype'       => 'backports',
    'page'           => 1,
    'showpager'      => false,
    'display_header' => false,
    'limit'          => $madbConfig->get('homepage_rpm_limit'),
    'short'          => true,
  )) ?>
  <br/>
  <?php echo link_to(
          "More backports...", 
          $madburl->urlFor('rpm/list', 
            $madbcontext, 
             array( 
               'extra_parameters' => array(
                  'listtype' => 'backports'
               )
             )
          )
        ); ?>
</div>
<?php endif; ?>