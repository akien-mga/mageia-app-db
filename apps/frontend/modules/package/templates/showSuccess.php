<?php slot('title', $package->getName()) ?>

<?php slot('name') ?>
Package : <?php echo $package->getName() ?>
<?php end_slot('name') ?>

<div class="package screenshots">
<div>
<h2>Package details</h2>

<div class="package-details">
  <div class="package-description">
    <strong>Summary</strong>: <?php echo htmlspecialchars($package->getSummary()) ?>
    <br />
    <br />
    <strong>Description</strong>:<br/>
    <?php echo nl2br(htmlspecialchars($package->getDescription())) ?></p>
    <br />
    <?php if (null !== $url): ?>
    <strong>URL</strong>: <?php echo link_to($url, $url) ?>
    <br/>
    <?php endif ?>
    <?php if (null !== $license): ?>
    <strong>License</strong>: <?php echo $license ?>
    <br/>
    <?php endif ?>
    <?php if (null !== $package->getMaintainer()): ?>
    <?php $urlHelperFactory = new madbUrlHelperFactory();
          $urlHelper = $urlHelperFactory->create(); ?>
    <br/>
    <strong>Maintainer</strong>: <?php echo $urlHelper->getLinkToMaintainer($package->getMaintainer(), $package->getMaintainer()) ?>
    <?php endif ?>
  </div>

  <?php if (count($first_screenshot)): ?>
  <div class='main-screenshot'>
    <a rel="screenshots" href="<?php echo $first_screenshot['large_image_url'] ?>">
      <?php echo image_tag($first_screenshot['large_image_url']) ?>
    </a>
  </div>
  <?php endif ?>
</div>

<h2>List of RPMs</h2>
<ul class="packlist">
  <?php foreach ($rpms as $rpm) : ?>
  <li><?php echo link_to($rpm->getName(), $madburl->urlForRpm($rpm, $madbcontext)); ?>
    (<?php echo $rpm->getDistrelease()->getDisplayedName() ?>,
     <?php echo $rpm->getArch()->getName()?> media,
     <?php echo $rpm->getMedia()->getName()?>)
     <?php if ($allow_install && !$rpm->getIsSource()) : ?>
       <?php echo link_to('<i class="icon-cloud-download"></i> Install', 'rpm/installDialog?id=' . $rpm->getId(), array('class' => 'install_link button')) ?>
     <?php endif; ?>
  </li>
  <?php endforeach; ?>
  <?php if (empty($rpms)) : ?>
  <p>No RPM found for <?php echo $package->getName() ?> using the current filters, try other values.</p>
  <?php endif; ?>
</ul>
</div>
<br/>

<?php if (count($other_screenshots)): ?>
<h2>More screenshots</h2>

<div id="screenshots">
<?php foreach ($other_screenshots as $screenshot): ?>
  <a rel="screenshots" href="<?php echo $screenshot['large_image_url'] ?>">
    <img src="<?php echo $screenshot['small_image_url'] ?>" alt="screenshot" />
  </a>
<?php endforeach ?>

</div>
<?php endif ?>

<br/>
<br/>
<!--  <h2>Backport requests</h2> -->
<?php if ($sf_user->isAuthenticated()): ?>
  <a href="#" id="packageSubscribe">
    <?php echo ($subscription) ? "Change or remove your subscription to this package's changes" : "Subscribe to this package's changes"?>
  </a>

  <div id="subscribeForm" title="Subscribe to changes for this package" style="display: none">
  Select the type of changes for which you want to be notified, and if needed restrict the subscription to one or
  several distribution releases, archs and/or medias. Unchecking everything means "all".
  <br/>
  <br/>
  <form action="<?php echo $madburl->urlFor('package/subscribe')?>">
  <?php echo $subscribe_form['package_id']->render() ?>

  <?php $formField = $subscribe_form['type']?>
  <?php echo $formField->renderLabel() ?>
  <?php echo $formField->render() ?>
  <?php $filterValues = $types; ?>
  <?php $values = $formField->getValue() ?>
  <?php if (!empty($values)): ?>
  <?php $displayed_values = array() ?>
  <?php foreach ($values as $value) {$displayed_values[] = $filterValues[$value];} ?>
    <span class='filtervalues'><?php echo implode(', ', $displayed_values); ?></span>
  <?php else : ?>
    <span class='filtervalues'>All</span>
  <?php endif; ?>
  <br style="clear:both;"/>
  <br/>
  <p>In the following filter, values "Latest stable" and "Previous stable" are dynamic values: their meaning will
    evolve automatically when new releases of the distribution appear. Use them if you want your subscriptions to adapt
    to new releases of the distribution.</p>
  <br/>
  <?php foreach (array('release', 'arch', 'media') as $fieldName) : ?>
    <?php $formField = $subscribe_form[$fieldName]?>
    <?php echo $formField->renderLabel() ?>
    <?php echo $formField->render() ?>
    <?php $filterFactory = new filterFactory(); ?>
    <?php $filter = $filterFactory->create($formField->getName()); ?>
    <?php $filterValues = $filter->getValues(); ?>
    <?php $values = $formField->getValue() ?>
    <?php if (!empty($values)): ?>
    <?php $displayed_values = array() ?>
  <?php foreach ($values as $value) {$displayed_values[] = $filterValues[$value];} ?>
    <span class='filtervalues'><?php echo implode(', ', $displayed_values); ?></span>
  <?php else : ?>
    <span class='filtervalues'>All</span>
  <?php endif; ?>
  <br style="clear:both;"/>
  <br/>
  <?php endforeach;?>

      <button class="subscribe">Subscribe</button>
      <button class="unsubscribe">Remove subscription</button>
      <button class="cancel">Cancel</button>

  </form>
  </div>
<?php endif; ?>

</div>

