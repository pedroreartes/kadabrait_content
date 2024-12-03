<?php

namespace Drupal\kadabrait_content\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;

/**
 * Controller for displaying user-specific content.
 */
class UserContentsController extends ControllerBase {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * The current user.
   *
   * @var \Drupal\Core\Session\AccountInterface
   */
  protected $currentUser;

  /**
   * Constructs a UserContentsController object.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   * @param \Drupal\Core\Session\AccountInterface $current_user
   *   The current user.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager, AccountInterface $current_user) {
    $this->entityTypeManager = $entity_type_manager;
    $this->currentUser = $current_user;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager'),
      $container->get('current_user')
    );
  }

  /**
   * Displays the user's content.
   *
   * @return array
   *   A render array representing the user's content.
   */
  public function content() {
    $query = $this->entityTypeManager->getStorage('node')->getQuery()
      ->condition('uid', $this->currentUser->id())
      ->sort('created', 'DESC')
      ->range(0, 10)
      ->accessCheck(TRUE);

    $nids = $query->execute();
    $nodes = $this->entityTypeManager->getStorage('node')->loadMultiple($nids);

    $build = [
      '#theme' => 'item_list',
      '#items' => [],
      '#cache' => [
        'contexts' => ['user'],
        'tags' => ['node_list'],
      ],
    ];

    foreach ($nodes as $node) {
      $build['#items'][] = [
        '#type' => 'link',
        '#title' => $node->getTitle(),
        '#url' => $node->toUrl(),
      ];
    }

    if (empty($build['#items'])) {
      $build['#empty'] = $this->t('No content found.');
    }

    return $build;
  }

}
