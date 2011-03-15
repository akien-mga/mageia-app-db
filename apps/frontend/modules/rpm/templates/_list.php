<?php if ($showpager): ?>
  <?php include_partial('default/pager', array(
    'pager'       => $pager, 
    'module'      => 'rpm', 
    'action'      => 'list', 
    'madbcontext' => $madbcontext, 
    'madburl'     => $madburl,
    'showtotal'   => true,
  )) ?>
<?php endif; ?>
<table class="packlist">
  <thead>
    <?php if ($display_header): ?>
    <tr>
      <th>Name</th>
      <th>Summary</th>
      <th>Version</th>
      <?php if (!isset($short)): ?>
      <th>Build date</th>
      <th>Distribution<br/>release</th>
      <?php endif; ?>
    </tr>
    <?php endif; ?>
  </thead>
  <tbody>
  <?php foreach ($pager as $rpm): ?>
    <tr>
      <td><?php echo link_to(
                  $rpm->getPackage()->getName(), 
                  $madburl->urlFor(
                    'package/show', 
                    $madbcontext, 
                    array('extra_parameters' => array('id' => $rpm->getPackage()->getId()))
                  )
                ); ?></td>
      <td><?php echo $rpm->getSummary() ?></td>
      <td><?php echo link_to(
                  $rpm->getVersion(), 
                  $madburl->urlFor(
                    'rpm/show', 
                    $madbcontext, 
                    array('extra_parameters' => array('id' => $rpm->getid()))
                  )
                ); ?></td>
      <?php if (!isset($short)): ?>
      <td><?php echo $rpm->getBuildtime('Y-m-d') ?></td>
      <td><?php echo $rpm->getDistrelease()->getName() ?></td>
      <?php endif; ?>
    </tr> 
  <?php endforeach; ?>
</tbody>
</table>
<?php if ($showpager): ?>
  <?php include_partial('default/pager', array(
    'pager'       => $pager, 
    'module'      => 'rpm', 
    'action'      => 'list', 
    'madbcontext' => $madbcontext, 
    'madburl'     => $madburl,
  )) ?>
<?php endif; ?>