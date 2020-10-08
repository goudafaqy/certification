<?php

return [

 /*
  *  Constants
  */
  'nav-administrators'            => 'مدراء النظام',
  'nav-agents'                    => 'مسؤولي الدعم',
  'nav-categories'                => 'التصنيفات',
  'nav-configuration'             => 'Configuration',
  'nav-dashboard'                 => 'لوحة التحكم',
  'nav-dashboard-title'           => 'لوحة تحكم مدير النظام',
  'nav-members'                   => 'مستخدم دعم فني',
  'nav-notices'                   => 'الإشعارات',
  'nav-priorities'                => 'الأولويات',
  'nav-settings'                  => 'الإعدادات',
  'nav-statuses'                  => 'الحالات',

  'table-hash'                    => '#',
  'table-id'                      => 'ID',
  'table-name'                    => 'اسم',
  'table-create-level'            => 'إنشاء تذاكر',
  'table-action'                  => 'حدث',
  'table-categories'              => 'الفئات',
  'table-categories-autoasg-title'=> 'تخصيص تلقائي للتذاكر الجديدة',
  'table-email'                   => 'E-mail',
  'table-magnitude'               => 'Magnitude',
  'table-num-tickets'             => 'عدد التذاكر',
  'table-remove-agent'            => 'Remove from agents',
  'table-remove-administrator'    => 'Remove from administrators', // New

  'table-slug'                    => 'Slug',
  'table-default'                 => 'قيمة تلقائية',
  'table-value'                   => 'My Value',
  'table-lang'                    => 'Lang',
  'table-description'             => 'الوصف',
  'table-edit'                    => 'تعديل',

  'btn-add-new'                   => 'إضافة جديدة',
  'btn-back'                      => 'خلف',
  'btn-change'                    => 'تعديل',
  'btn-create'                    => 'انشاء',
  'btn-delete'                    => 'حذف',
  'btn-edit'                      => 'تعديل',
  'btn-join'                      => 'ربط',
  'btn-remove'                    => 'إزالة',
  'btn-submit'                    => 'ارسال',
  'btn-save'                      => 'حفظ',
  'btn-update'                    => 'تحديث',

  // Vocabulary
  'admin'                         => 'مدير النظام',
  'colon'                         => ': ',
  'role'                          => 'دور',

  /* Access Levels */
  'level-1'                       => 'الكل',
  'level-2'                       => 'assigned agents + admins.',
  'level-3'                       => 'admins.',

 /*
  *  Page specific
  */

// $admin_route_path/dashboard
  'index-title'                         => 'لوحة تحكم نظام التذاكر',
  'index-empty-records'                 => 'لا يوجد تذاكر حتى الآن',
  'index-total-tickets'                 => 'مجموع التذاكر',
  'index-newest-tickets'                => 'تذاكر جديدة',
  'index-active-tickets'                => 'تذاكر فعالة',
  'index-complete-tickets'              => 'التذاكر المغلقة',
  'index-performance-indicator'         => 'مؤشر الأداء',
  'index-periods'                       => 'الفترات',
  'index-3-months'                      => 'ثلاثة أشهر',
  'index-6-months'                      => 'ستة أشهر',
  'index-12-months'                     => 'إثنا عشر شهراً',
  'index-tickets-share-per-category'    => 'حصة التذاكر لكل فئة',
  'index-tickets-share-per-agent'       => 'حصة التذاكر لكل مسؤول دعم',
  'index-categories'                    => 'الفئات',
  'index-category'                      => 'الفئة',
  'index-agents'                        => 'مسؤولي الدعم',
  'index-agent'                         => 'مسؤول الدعم',
  'index-administrators'                => 'مدراء النظام',
  'index-administrator'                 => 'مدير النظام',
  'index-users'                         => 'المستخدمون',
  'index-user'                          => 'المستخدم',
  'index-tickets'                       => 'التذاكر',
  'index-open'                          => 'مفتوح',
  'index-closed'                        => 'مغلق',
  'index-total'                         => 'المجموع',
  'index-month'                         => 'الشهر',
  'index-performance-chart'             => 'في المعدل كم يوماً يلزم لحل التذكرة؟',
  'index-categories-chart'              => 'توزيع التذاكر حسب الفئة',
  'index-agents-chart'                  => 'توزيع التذاكر حسب مسؤولي الدعم',
  'index-view-category-tickets'         => 'View :list tickets in :category category',
  'index-view-agent-tickets'            => 'View agent assigned :list tickets',
  'index-view-user-tickets'             => 'View user own :list tickets',

// $admin_route_path/agent/____
  'agent-index-title'             => 'إدارة مسؤول الدعم',
  'agent-index-no-agents'         => 'لا يوجد مسؤولي دعم',
  'agent-index-create-new'        => 'إضافة مسؤول دعم',
  'agent-create-form-agent'       => 'المستخدم',
  'agent-create-add-agents'       => 'إضاة مسؤولي دعم',
  'agent-create-no-users'         => 'لا توجد حسابات مستخدمين، قم بإنشاء حسابات مستخدمين أولاً.',
  'agent-store-ok'                => 'User ":name" has been added to agents',
  'agent-updated-ok'              => 'Agent ":name" updated successfully',
  'agent-excluded-ok'             => 'Agent ":name" excluded from agents',

  'agent-store-error-no-category' => '
لإضافة مسؤول دعم ، يجب عليك التحقق من فئة واحدة على الأقل',

// $admin_route_path/agent/edit
  'agent-edit-title'                 => 'User permissions :agent',
  'agent-edit-table-category'        => 'الفئة',
  'agent-edit-table-agent'           => 'Agent permission',
  'agent-edit-table-autoassign'      => 'تذاكر تلقائية جديدة.',

// $admin_route_path/administrators/____
  'administrator-index-title'                   => 'إدارة مشرفي النظام',
  'btn-create-new-administrator'                => 'انشاء مدير نظام',
  'administrator-index-no-administrators'       => 'لا يوجد مدراء نظام ',
  'administrator-index-create-new'              => 'إضافة مدراء نظام',
  'administrator-create-title'                  => 'إضافة مدير نظام',
  'administrator-create-add-administrators'     => 'إضافة مدراء نظام',
  'administrator-create-no-users'               => 'لا توجد حسابات مستخدمين، قم بإنشاء حسابات مستخدمين أولاً.',
  'administrator-create-select-user'            => 'حدد حسابات المستخدمين لإضافتها كمسؤولين',

// $admin_route_path/category/____
  'category-index-title'          => 'إدارة الفئات',
  'btn-create-new-category'       => 'انشاء فئة جديدة',
  'category-index-no-categories'  => 'لا يتوجد فئات ',
  'category-index-create-new'     => 'إنشاء فئة جديدة',
  'category-index-js-delete'      => 'هل أنت متأكد أنك تريد حذف هذه الفئة؟ ',
  'category-index-email'          => 'إشعارات البريد الإلكتروني',
  'category-index-reasons'        => 'أسباب الإغلاق',
  'category-index-tags'           => 'العلامات',

  'category-create-title'              => 'انشاء فئة جديدة',
  'category-create-name'               => 'الاسم',
  'category-create-email'              => 'إشعارات البريد الإلكتروني',
  'category-email-origin'              => 'الأصل',
  'category-email-origin-website'      => 'موقع الكتروني',
  'category-email-origin-tickets'      => 'Tickets general email',
  'category-email-origin-category'     => 'هذه الفئة',
  'category-email-from'                => 'مِن',
  'category-email-name'                => 'الاسم',
  'category-email'                     => 'البريد الإلكتروني',
  'category-email-reply-to'            => 'توجيه إلى',
  'category-email-default'             => 'تلقائي',
  'category-email-this'                => 'صندوق البريد هذا',
  'category-email-from-info'           => 'Mail sender used on all notifications in this category',
  'category-email-reply-to-info'       => 'Destination e-mail for notification e-mail replies',
  'category-email-reply-this-info'     => 'المحدد أدناه',
  'category-create-color'              => 'اللون',
  'category-create-new-tickets'        => 'من يمكنه إنشاء التذاكر؟',
  'category-create-new-tickets-help'   => 'المستوى الأدنى لإنشاء التذاكر في الفئة',

  'category-edit-title'           => 'Edit Category: :name',

  'category-edit-closing-reasons'      => 'أسباب إغلاق التذكرة',
  'category-edit-closing-reasons-help' => 'الخيارات التي قد يختارها المستخدم عند إغلاق التذكرة',
  'category-edit-reason'               => 'سبب الإغلاق',
  'category-edit-reason-label'         => 'السبب',
  'category-edit-reason-status'        => 'الحالة',
  'category-delete-reason'             => 'حذف السبب',

  'category-edit-new-tags'        => 'علامات جديدة',
  'category-edit-current-tags'    => 'العلامات الحالية',
  'category-edit-new-tag-title'   => 'قم بإنشاء علامة جديدة',
  'category-edit-new-tag-default' => 'علامة جديدة',
  'category-edit-tag'             => 'تحرير العلامة',
  'category-edit-tag-background'  => 'الخلفية',
  'category-edit-tag-text'        => 'النص',

  'new-tag-validation-empty'      => 'لا يمكنك تسجيل علامة باسم فارغ!',
  'update-tag-validation-empty'   => 'You cannot leave blank the tag name of the one previously named ":name"',

  // Category form validation
  'category-reason-is-empty'      => 'Closing reason :number has no text',
  'category-reason-too-short'     => 'Closing reason :number with name ":name" requires :min characters',
  'category-reason-no-status'     => 'Closing reason :number with name ":name" requires a defined status',

  'tag-regex'                     => '/^[A-Za-z0-9?@\/\-_\s]+$/',
  'category-tag-not-valid-format' => 'Tag ":tag" format is not valid',
  'tag-validation-two'            => 'You have introduced two tags with the same name ":name"',

// $admin_route_path/member/____
  'member-index-title'            => 'إدارة مستخدمي الدعم الفني',
  'member-index-help'             => '
الأعضاء هم جميع المستخدمين المسجلين في قاعدة البيانات. ربما قام مسؤول الموقع بتصفية القائمة',
  'member-index-empty'            => 'لم يتم العثور على أعضاء مسجلين',
  'member-table-own-tickets'      => 'Own tickets',
  'member-table-assigned-tickets' => 'التذاكر المخصصة',
  'member-modal-update-title'     => 'تحديث مستخدم دعم فني',
  'member-modal-create-title'     => 'إنشاء مستخدم دعم فني',
  'member-delete-confirmation'    => 'هل أنت متأكد أنك تريد حذف هذا المستخدم من قاعدة البيانات؟',
  'member-password-label'         => 'كلمة المرور',
  'member-new-password-label'     => 'كلمة مرور جديدة (اختياري)',
  'member-password-repeat-label'  => 'اعد كلمة السر',
  'member-added-ok'               => 'Member ":name" has been created correctly',
  'member-updated-ok'             => 'Member ":name" has been updated correctly',
  'member-deleted'                => 'Member ":name" has been DELETED',
  'member-delete-own-user-error'  => 'لا يمكنك حذف حساب المستخدم الخاص بك',
  'member-delete-agent'           => 'To enable this member deletion, delete it\'ts agent roles first',
  'member-with-tickets-delete'    => 'You cannot delete a member with related tickets',

// $admin_route_path/priority/____
  'priority-index-title'              => 'إدارة الأولويات',
  'priority-index-help'               => 'يمكنك تغيير ترتيب الأولوية بسحب صفوف الجدول هذا. سيتم استخدام هذا الطلب أيضًا في قائمة التذاكر عند التحقق من هذا الحقل',
  'btn-create-new-priority'           => 'قم بإنشاء أولوية جديدة',
  'priority-index-no-priorities'      => 'لا توجد أولويات ',
  'priority-index-create-new'         => 'إنشاء أولوية جديدة',
  'priority-index-js-delete'          => 'هل أنت متأكد من أنك تريد حذف الأولوية: ',
  'priority-create-title'             => 'إنشاء أولوية جديدة',
  'priority-create-name'              => 'الاسم',
  'priority-create-color'             => 'اللون',
  'priority-edit-title'               => 'Edit priority: :name',
  'priority-delete-title'             => 'Delete priority: :name',
  'priority-delete-warning'           => 'There are <span class="modal-tickets-count"></span> tickets that use this priority. You must choose another one for all of them',
  'priority-delete-error-no-priority' => 'You have to specify a new priority for ":name" priority related tickets',

// $admin_route_path/status/____
  'status-index-title'            => 'إدارة الحالات',
  'btn-create-new-status'         => 'إنشاء حالة جديدة',
  'status-index-no-statuses'      => 'ليس هناك حالات',
  'status-index-create-new'       => 'إنشاء حالة جديدة',
  'status-index-js-delete'        => 'هل أنت متأكد من أنك تريد حذف الحالة:',
  'status-create-title'           => 'إنشاء حالة جديدة',
  'status-create-name'            => 'الاسم',
  'status-create-color'           => 'اللون',
  'status-edit-title'             => 'Edit Status: :name',
  'status-delete-title'           => 'Delete status ":name"',
  'status-delete-warning'         => 'There are <span class="modal-tickets-count"></span> tickets that use this status. You must choose another one for all of them',
  'status-delete-error-no-status' => 'You have to specify a new status for ":name" status related tickets',

// $admin_route_path/notice/____
  'notice-index-title'          => 'إشعارات لإدارة الأقسام',
  'btn-create-new-notice'       => 'إضافة إشعار',
  'notice-index-empty'          => 'There are no notices configured.',
  'notice-index-owner'          => 'المالك',
  'notice-index-email'          => 'Notice e-mail',
  'notice-index-department'     => 'Notice visible for',
  'notice-modal-title-create'   => 'إضافة إشعار إلى القسم',
  'notice-modal-title-update'   => 'تحديث إشعار لقسم',
  'notice-saved-ok'             => 'تم حفظ الإشعار بشكل صحيح',
  'notice-deleted-ok'           => 'تم حذف الإشعار',
  'notice-index-js-delete'      => 'هل أنت متأكد من أنك تريد حذف هذا الإشعار؟',
  'notice-index-help'           => 'When a ticket set with one of the following owners is created, there will happen two things:<br /><br /><ol><li>An e-mail will be sent to ticket <b>owner</b>, with a specific e-mail template.</li><li>As long as the ticket is <b>open</b>, users in the same department will see the ticket as a <b>notice</b> in the create ticket menu.',
  'notice-index-owner-alert'    => 'لن يتمكن المستخدم العادي ، عند إنشاء تذكرة جديدة ، من رؤية أي مستخدم مدرج هنا',

// $admin_route_path/configuration/____
  'config-index-title'            => 'ضبط الإعدادات',
  'config-index-subtitle'         => 'الإعدادات',
  'btn-create-new-config'         => 'أضف إعدادًا جديدًا',
  'config-index-no-settings'      => 'لا توجد إعدادات ،',
  'config-index-initial'          => 'المبدئي',
  'config-index-features'         => 'المميزات',
  'config-index-tickets'          => 'التذاكر',
  'config-index-table'            => 'الجدول',
  'config-index-notifications'    => 'إشعارات',
  'config-index-permissions'      => 'الأذونات',
  'config-index-editor'           => 'Editor', //Added: 2016.01.14
  'config-index-other'            => 'الآخر',
  'config-create-title'           => 'Create: New Global Setting',
  'config-create-subtitle'        => 'إنشاء الإعداد',
  'config-edit-title'             => 'Edit: Global Configuration',
  'config-edit-subtitle'          => 'تعديل إعداد',
  'config-edit-id'                => 'ID',
  'config-edit-slug'              => 'Slug',
  'config-edit-default'           => 'قيمة تلقائية',
  'config-edit-value'             => 'My value',
  'config-edit-language'          => 'اللغة',
  'config-edit-unserialize'       => 'احصل على قيم المصفوفة وقم بتغيير القيم',
  'config-edit-serialize'         => 'Get the serialized string of the changed values (to be entered in the field)',
  'config-edit-should-serialize'  => 'التسلسل', //Added: 2016-01-16
  'config-edit-eval-warning'      => 'When checked, the server will run eval()!
  									  Don\'t use this if eval() is disabled on your server or if you don\'t exactly know what you are doing!
  									  Exact code executed:', //Added: 2016-01-16
  'config-edit-reenter-password'  => 'إعادة إدخال كلمة المرور الخاصة بك', //Added: 2016-01-16
  'config-edit-auth-failed'       => 'كلمة المرور غير متطابقة', //Added: 2016-01-16
  'config-edit-eval-error'        => 'قيمة غير صالحة', //Added: 2016-01-16
  'config-edit-tools'             => 'Tools:',
  'config-update-confirm'         => 'Configuration :name has been updated',
  'config-delete-confirm'         => 'Configuration :name has been deleted',
];
