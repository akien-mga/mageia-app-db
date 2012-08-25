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
<?php 
if ($show_bug_links)
{
  $bugtrackerFactory = new madbBugtrackerFactory();
  $bugtracker = $bugtrackerFactory->create();
}
?>
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
        <?php if ($show_bug_links): ?>
      <th>Bug link</th>
        <?php endif; ?>
      <?php endif; ?>
    </tr>
    <?php endif; ?>
  </thead>
  <tbody>
  <?php $dates = array(); ?>
  <?php foreach ($pager as $rpm): ?>
    <?php $buildDate         = $rpm->getBuildtime('Y-m-d'); ?>
    <?php $dates[$buildDate] = $buildDate; ?>
    <tr class="rpm-<?php echo count($dates) % 2 ? 'odd' : 'even'?>">
      <td><?php echo link_to(
                  $rpm->getPackage()->getName(), 
                  $madburl->urlFor(
                    'package/show', 
                    $madbcontext, 
                    array('extra_parameters' => array('name' => $rpm->getPackage()->getName()))
                  )
                ); ?></td>
      <td><?php echo htmlspecialchars($rpm->getSummary()) ?></td>
      <td><?php echo link_to(
                  $rpm->getVersion(), 
                  $madburl->urlForRpm($rpm, $madbcontext)
                ); ?>
      </td>
      <?php if (!isset($short)): ?>
      <td><?php echo $buildDate ?></td>
      <td><?php echo $rpm->getDistrelease()->getDisplayedName() ?></td>
        <?php if ($show_bug_links and $rpm->getIsSource()): 
          $link = "";
          $tab = $bugtracker->findBugForUpdateCandidate($rpm->getName(), $show_all_bug_links);
          if ($tab)
          {
            list($number, $match_type) = $tab;
            $link = link_to($number . " (" . $bugtracker->getLabelForMatchType($match_type) . ")", $bugtracker->getUrlForBug($number));
          }
        ?>
      <td><?php echo $link ?></td>
        <?php endif; ?>
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
