<?php

return [

 /*
  *  Constants
  */
  'nav-administrators'            => '����� ������',
  'nav-agents'                    => '������ �����',
  'nav-categories'                => '���������',
  'nav-configuration'             => 'Configuration',
  'nav-dashboard'                 => '���� ������',
  'nav-dashboard-title'           => '���� ���� ���� ������',
  'nav-members'                   => '������ ��� ���',
  'nav-notices'                   => '���������',
  'nav-priorities'                => '���������',
  'nav-settings'                  => '���������',
  'nav-statuses'                  => '�������',

  'table-hash'                    => '#',
  'table-id'                      => 'ID',
  'table-name'                    => '���',
  'table-create-level'            => '����� �����',
  'table-action'                  => '���',
  'table-categories'              => '������',
  'table-categories-autoasg-title'=> '����� ������ ������� �������',
  'table-email'                   => 'E-mail',
  'table-magnitude'               => 'Magnitude',
  'table-num-tickets'             => '��� �������',
  'table-remove-agent'            => 'Remove from agents',
  'table-remove-administrator'    => 'Remove from administrators', // New

  'table-slug'                    => 'Slug',
  'table-default'                 => '���� �������',
  'table-value'                   => 'My Value',
  'table-lang'                    => 'Lang',
  'table-description'             => '�����',
  'table-edit'                    => '�����',

  'btn-add-new'                   => '����� �����',
  'btn-back'                      => '���',
  'btn-change'                    => '�����',
  'btn-create'                    => '�����',
  'btn-delete'                    => '���',
  'btn-edit'                      => '�����',
  'btn-join'                      => '���',
  'btn-remove'                    => '�����',
  'btn-submit'                    => '�����',
  'btn-save'                      => '���',
  'btn-update'                    => '�����',

  // Vocabulary
  'admin'                         => '���� ������',
  'colon'                         => ': ',
  'role'                          => '���',

  /* Access Levels */
  'level-1'                       => '����',
  'level-2'                       => 'assigned agents + admins.',
  'level-3'                       => 'admins.',

 /*
  *  Page specific
  */

// $admin_route_path/dashboard
  'index-title'                         => '���� ���� ���� �������',
  'index-empty-records'                 => '�� ���� ����� ��� ����',
  'index-total-tickets'                 => '����� �������',
  'index-newest-tickets'                => '����� �����',
  'index-active-tickets'                => '����� �����',
  'index-complete-tickets'              => '������� �������',
  'index-performance-indicator'         => '���� ������',
  'index-periods'                       => '�������',
  'index-3-months'                      => '����� ����',
  'index-6-months'                      => '��� ����',
  'index-12-months'                     => '���� ��� �����',
  'index-tickets-share-per-category'    => '��� ������� ��� ���',
  'index-tickets-share-per-agent'       => '��� ������� ��� ����� ���',
  'index-categories'                    => '������',
  'index-category'                      => '�����',
  'index-agents'                        => '������ �����',
  'index-agent'                         => '����� �����',
  'index-administrators'                => '����� ������',
  'index-administrator'                 => '���� ������',
  'index-users'                         => '����������',
  'index-user'                          => '��������',
  'index-tickets'                       => '�������',
  'index-open'                          => '�����',
  'index-closed'                        => '����',
  'index-total'                         => '�������',
  'index-month'                         => '�����',
  'index-performance-chart'             => '�� ������ �� ����� ���� ��� ������ɿ',
  'index-categories-chart'              => '����� ������� ��� �����',
  'index-agents-chart'                  => '����� ������� ��� ������ �����',
  'index-view-category-tickets'         => 'View :list tickets in :category category',
  'index-view-agent-tickets'            => 'View agent assigned :list tickets',
  'index-view-user-tickets'             => 'View user own :list tickets',

// $admin_route_path/agent/____
  'agent-index-title'             => '����� ����� �����',
  'agent-index-no-agents'         => '�� ���� ������ ���',
  'agent-index-create-new'        => '����� ����� ���',
  'agent-create-form-agent'       => '��������',
  'agent-create-add-agents'       => '���� ������ ���',
  'agent-create-no-users'         => '�� ���� ������ �������� �� ������ ������ �������� �����.',
  'agent-store-ok'                => 'User ":name" has been added to agents',
  'agent-updated-ok'              => 'Agent ":name" updated successfully',
  'agent-excluded-ok'             => 'Agent ":name" excluded from agents',

  'agent-store-error-no-category' => '
������ ����� ��� � ��� ���� ������ �� ��� ����� ��� �����',

// $admin_route_path/agent/edit
  'agent-edit-title'                 => 'User permissions :agent',
  'agent-edit-table-category'        => '�����',
  'agent-edit-table-agent'           => 'Agent permission',
  'agent-edit-table-autoassign'      => '����� ������� �����.',

// $admin_route_path/administrators/____
  'administrator-index-title'                   => '����� ����� ������',
  'btn-create-new-administrator'                => '����� ���� ����',
  'administrator-index-no-administrators'       => '�� ���� ����� ���� ',
  'administrator-index-create-new'              => '����� ����� ����',
  'administrator-create-title'                  => '����� ���� ����',
  'administrator-create-add-administrators'     => '����� ����� ����',
  'administrator-create-no-users'               => '�� ���� ������ �������� �� ������ ������ �������� �����.',
  'administrator-create-select-user'            => '��� ������ ���������� �������� ��������',

// $admin_route_path/category/____
  'category-index-title'          => '����� ������',
  'btn-create-new-category'       => '����� ��� �����',
  'category-index-no-categories'  => '�� ����� ���� ',
  'category-index-create-new'     => '����� ��� �����',
  'category-index-js-delete'      => '�� ��� ����� ��� ���� ��� ��� ����ɿ ',
  'category-index-email'          => '������� ������ ����������',
  'category-index-reasons'        => '����� �������',
  'category-index-tags'           => '��������',

  'category-create-title'              => '����� ��� �����',
  'category-create-name'               => '�����',
  'category-create-email'              => '������� ������ ����������',
  'category-email-origin'              => '�����',
  'category-email-origin-website'      => '���� ��������',
  'category-email-origin-tickets'      => 'Tickets general email',
  'category-email-origin-category'     => '��� �����',
  'category-email-from'                => '���',
  'category-email-name'                => '�����',
  'category-email'                     => '������ ����������',
  'category-email-reply-to'            => '����� ���',
  'category-email-default'             => '������',
  'category-email-this'                => '����� ������ ���',
  'category-email-from-info'           => 'Mail sender used on all notifications in this category',
  'category-email-reply-to-info'       => 'Destination e-mail for notification e-mail replies',
  'category-email-reply-this-info'     => '������ �����',
  'category-create-color'              => '�����',
  'category-create-new-tickets'        => '�� ����� ����� ������ѿ',
  'category-create-new-tickets-help'   => '������� ������ ������ ������� �� �����',

  'category-edit-title'           => 'Edit Category: :name',

  'category-edit-closing-reasons'      => '����� ����� �������',
  'category-edit-closing-reasons-help' => '�������� ���� �� ������� �������� ��� ����� �������',
  'category-edit-reason'               => '��� �������',
  'category-edit-reason-label'         => '�����',
  'category-edit-reason-status'        => '������',
  'category-delete-reason'             => '��� �����',

  'category-edit-new-tags'        => '������ �����',
  'category-edit-current-tags'    => '�������� �������',
  'category-edit-new-tag-title'   => '�� ������ ����� �����',
  'category-edit-new-tag-default' => '����� �����',
  'category-edit-tag'             => '����� �������',
  'category-edit-tag-background'  => '�������',
  'category-edit-tag-text'        => '����',

  'new-tag-validation-empty'      => '�� ����� ����� ����� ���� ����!',
  'update-tag-validation-empty'   => 'You cannot leave blank the tag name of the one previously named ":name"',

  // Category form validation
  'category-reason-is-empty'      => 'Closing reason :number has no text',
  'category-reason-too-short'     => 'Closing reason :number with name ":name" requires :min characters',
  'category-reason-no-status'     => 'Closing reason :number with name ":name" requires a defined status',

  'tag-regex'                     => '/^[A-Za-z0-9?@\/\-_\s]+$/',
  'category-tag-not-valid-format' => 'Tag ":tag" format is not valid',
  'tag-validation-two'            => 'You have introduced two tags with the same name ":name"',

// $admin_route_path/member/____
  'member-index-title'            => '����� ������� ����� �����',
  'member-index-help'             => '
������� �� ���� ���������� �������� �� ����� ��������. ���� ��� ����� ������ ������ �������',
  'member-index-empty'            => '�� ��� ������ ��� ����� ������',
  'member-table-own-tickets'      => 'Own tickets',
  'member-table-assigned-tickets' => '������� �������',
  'member-modal-update-title'     => '����� ������ ��� ���',
  'member-modal-create-title'     => '����� ������ ��� ���',
  'member-delete-confirmation'    => '�� ��� ����� ��� ���� ��� ��� �������� �� ����� �������ʿ',
  'member-password-label'         => '���� ������',
  'member-new-password-label'     => '���� ���� ����� (�������)',
  'member-password-repeat-label'  => '��� ���� ����',
  'member-added-ok'               => 'Member ":name" has been created correctly',
  'member-updated-ok'             => 'Member ":name" has been updated correctly',
  'member-deleted'                => 'Member ":name" has been DELETED',
  'member-delete-own-user-error'  => '�� ����� ��� ���� �������� ����� ��',
  'member-delete-agent'           => 'To enable this member deletion, delete it\'ts agent roles first',
  'member-with-tickets-delete'    => 'You cannot delete a member with related tickets',

// $admin_route_path/priority/____
  'priority-index-title'              => '����� ���������',
  'priority-index-help'               => '����� ����� ����� �������� ���� ���� ������ ���. ���� ������� ��� ����� ����� �� ����� ������� ��� ������ �� ��� �����',
  'btn-create-new-priority'           => '�� ������ ������ �����',
  'priority-index-no-priorities'      => '�� ���� ������� ',
  'priority-index-create-new'         => '����� ������ �����',
  'priority-index-js-delete'          => '�� ��� ����� �� ��� ���� ��� ��������: ',
  'priority-create-title'             => '����� ������ �����',
  'priority-create-name'              => '�����',
  'priority-create-color'             => '�����',
  'priority-edit-title'               => 'Edit priority: :name',
  'priority-delete-title'             => 'Delete priority: :name',
  'priority-delete-warning'           => 'There are <span class="modal-tickets-count"></span> tickets that use this priority. You must choose another one for all of them',
  'priority-delete-error-no-priority' => 'You have to specify a new priority for ":name" priority related tickets',

// $admin_route_path/status/____
  'status-index-title'            => '����� �������',
  'btn-create-new-status'         => '����� ���� �����',
  'status-index-no-statuses'      => '��� ���� �����',
  'status-index-create-new'       => '����� ���� �����',
  'status-index-js-delete'        => '�� ��� ����� �� ��� ���� ��� ������:',
  'status-create-title'           => '����� ���� �����',
  'status-create-name'            => '�����',
  'status-create-color'           => '�����',
  'status-edit-title'             => 'Edit Status: :name',
  'status-delete-title'           => 'Delete status ":name"',
  'status-delete-warning'         => 'There are <span class="modal-tickets-count"></span> tickets that use this status. You must choose another one for all of them',
  'status-delete-error-no-status' => 'You have to specify a new status for ":name" status related tickets',

// $admin_route_path/notice/____
  'notice-index-title'          => '������� ������ �������',
  'btn-create-new-notice'       => '����� �����',
  'notice-index-empty'          => 'There are no notices configured.',
  'notice-index-owner'          => '������',
  'notice-index-email'          => 'Notice e-mail',
  'notice-index-department'     => 'Notice visible for',
  'notice-modal-title-create'   => '����� ����� ��� �����',
  'notice-modal-title-update'   => '����� ����� ����',
  'notice-saved-ok'             => '�� ��� ������� ���� ����',
  'notice-deleted-ok'           => '�� ��� �������',
  'notice-index-js-delete'      => '�� ��� ����� �� ��� ���� ��� ��� ������ѿ',
  'notice-index-help'           => 'When a ticket set with one of the following owners is created, there will happen two things:<br /><br /><ol><li>An e-mail will be sent to ticket <b>owner</b>, with a specific e-mail template.</li><li>As long as the ticket is <b>open</b>, users in the same department will see the ticket as a <b>notice</b> in the create ticket menu.',
  'notice-index-owner-alert'    => '�� ����� �������� ������ � ��� ����� ����� ����� � �� ���� �� ������ ���� ���',

// $admin_route_path/configuration/____
  'config-index-title'            => '��� ���������',
  'config-index-subtitle'         => '���������',
  'btn-create-new-config'         => '��� ������� ������',
  'config-index-no-settings'      => '�� ���� ������� �',
  'config-index-initial'          => '�������',
  'config-index-features'         => '��������',
  'config-index-tickets'          => '�������',
  'config-index-table'            => '������',
  'config-index-notifications'    => '�������',
  'config-index-permissions'      => '��������',
  'config-index-editor'           => 'Editor', //Added: 2016.01.14
  'config-index-other'            => '�����',
  'config-create-title'           => 'Create: New Global Setting',
  'config-create-subtitle'        => '����� �������',
  'config-edit-title'             => 'Edit: Global Configuration',
  'config-edit-subtitle'          => '����� �����',
  'config-edit-id'                => 'ID',
  'config-edit-slug'              => 'Slug',
  'config-edit-default'           => '���� �������',
  'config-edit-value'             => 'My value',
  'config-edit-language'          => '�����',
  'config-edit-unserialize'       => '���� ��� ��� �������� ��� ������ �����',
  'config-edit-serialize'         => 'Get the serialized string of the changed values (to be entered in the field)',
  'config-edit-should-serialize'  => '�������', //Added: 2016-01-16
  'config-edit-eval-warning'      => 'When checked, the server will run eval()!
  									  Don\'t use this if eval() is disabled on your server or if you don\'t exactly know what you are doing!
  									  Exact code executed:', //Added: 2016-01-16
  'config-edit-reenter-password'  => '����� ����� ���� ������ ������ ��', //Added: 2016-01-16
  'config-edit-auth-failed'       => '���� ������ ��� �������', //Added: 2016-01-16
  'config-edit-eval-error'        => '���� ��� �����', //Added: 2016-01-16
  'config-edit-tools'             => 'Tools:',
  'config-update-confirm'         => 'Configuration :name has been updated',
  'config-delete-confirm'         => 'Configuration :name has been deleted',
];
