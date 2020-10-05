<?php

return [

 /*
  *  Constants
  */

  'nav-new-tickets'                  => 'جديد',
  'nav-new-tickets-title'            => 'تذكرة جديدة',
  'nav-new-dd-list'                  => 'قائمة',
  'nav-new-dd-list-title'            => 'قائمة تذاكر جديدة',
  'nav-new-dd-create'                => 'إنشاء',
  'nav-create-ticket'                => 'إنشاء جديد',
  'nav-create-ticket-title'          => 'إنشاء تذكرة جديدة',
  'nav-notices-number-title'         => 'There are :num notices',
  'nav-active-tickets-title'         => 'تذاكر نشطة',
  'nav-completed-tickets-title'      => 'التذاكر المكتملة',

  // Regular expressions
  'regex-text-inline'                => '/^(?=.*[A-Za-z]+[\'\-¡!¿?\s,;.:]*)[a-zA-Z\'0-9¡!¿?,;.:\-\s]*$/',

  // Tables
  'table-id'                         => '#',
  'table-subject'                    => 'موضوع',
  'table-department'                 => 'قسم',
  'table-description'                => 'الوصف',
  'table-intervention'               => 'Intevention',
  'table-owner'                      => 'المالك',
  'table-status'                     => 'الحالة',
  'table-last-updated'               => 'Upd.',
  'table-priority'                   => 'الأولوية',
  'table-agent'                      => 'مسؤول دعم',
  'table-calendar'                   => 'التقويم',
  'table-completed_at'               => 'اكتمل في',
  'table-category'                   => 'الفئة',
  'table-tags'                       => 'العلامات',

  'no-tickets-yet'                   => 'لاتوجد  تذاكر حتى الآن', // Pending to move old admin.index-empty-records in other languages
  'list-no-tickets'                  => 'لا توجد تذاكر في هذه القائمة',
  'updated-by-other'                 => '
تم التحديث بواسطة مستخدم دعم فني',
  'mark-as-read'                     => 'ضع علامة على هذه التذكرة كمقروءة',
  'mark-as-unread'                   => 'ضع علامة على هذه التذكرة وأغلقها كغير مقروءة',
  'read-validation-error'            => 'تعذر وضع علامة على التذكرة كمقروءة / غير مقروءة',
  'read-validation-ok-read'          => 'تم وضع التذكرة على أنها مقروءة',
  'read-validation-ok-unread'        => 'تم وضع التذكرة على أنها غير مقروءة',

  'table-info-attachments-total'     => ':num attached files',
  'table-info-comments-total'        => ':num Total comments.',
  'table-info-comments-recent'       => ':num recent ones.',
  'table-info-notes-total'           => ':num internal notes',

        'calendar-active'            => 'Started :description',
  'calendar-active-today'            => 'Started :description',
  'calendar-active-future'           => 'Starts :description',
  'calendar-expired'                 => 'Expired :description',
  'calendar-expired-today'           => 'Expired today at :time',
  'calendar-expiration'              => 'Expires :description',
  'calendar-expires-today'           => 'Will expire today at :hour',
  'calendar-scheduled'               => 'Scheduled on :date from :time1 to :time2H',
  'calendar-scheduled-today'         => 'Scheduled today from :time1 to :time2H',
  'calendar-scheduled-period'        => 'Scheduled from :date1 to :date2',

  // Agent related
  'table-change-agent'               => 'تغيير مسؤول الدعم',
  'table-one-agent'                  => 'هناك مسؤول دعم واحد في هذه الفئة',
  'table-agent-status-check'         => 'Change status to ":status"',

  // list AJAX changes
  'table-change-priority'            => 'تغيير الأولوية',
  'table-change-status'              => 'تغيير الوضع',

  // Datatables
  'table-decimal'                    => '',
  'table-empty'                      => 'لا توجد بيانات متوفرة في الجدول',
  'table-info'                       => 'Showing _START_ to _END_ of _TOTAL_ entries',
  'table-info-empty'                 => 'Showing 0 to 0 of 0 entries',
  'table-info-filtered'              => '(filtered from _MAX_ total entries)',
  'table-info-postfix'               => '',
  'table-thousands'                  => ',',
  'table-length-menu'                => 'Show _MENU_ entries',
  'table-loading-results'            => 'جار التحميل...',
  'table-processing'                 => 'معالجة...',
  'table-search'                     => 'بحث:',
  'table-zero-records'               => 'لا توجد سجلات مطابقة',
  'table-paginate-first'             => 'الأول',
  'table-paginate-last'              => 'الآخِر',
  'table-paginate-next'              => 'التالي',
  'table-paginate-prev'              => 'السابق',
  'table-aria-sort-asc'              => ': activate to sort column ascending',
  'table-aria-sort-desc'             => ': activate to sort column descending',

  'filter-removeall-title'           => ' إزالة جميع المُرشِحات الفلاتر',
  'filter-pov'                       => 'عرض كـ',
  'filter-pov-member-title'          => 'عرضه كمستخدم دعم فني',
  'filter-pov-agent-title'           => 'عرضه كمسؤول دعم',
  'filter-year-all'                  => 'الكل',
  'filter-calendar'                  => 'التقويم',
  'filter-calendar-all'              => 'الكل',
  'filter-calendar-expired'          => 'منتهي الصلاحية انقضت مدة الإنجاز',
  'filter-calendar-not-scheduled'    => 'غير مجدول',
  'filter-calendar-today'            => 'تنتهي مهلة الإنجاز اليوم',
  'filter-calendar-tomorrow'         => 'تنتهي مهلة الإنجاز غداً',
  'filter-calendar-week'             => 'هذا الإسبوع',
  'filter-calendar-month'            => 'هذا الشهر',
  'filter-calendar-within-7-days'    => 'في 7 أيام',
  'filter-calendar-within-14-days'   => 'في 14 يوماً',
  'filter-category'                  => 'الفئة',
  'filter-category-all'              => 'الكل',
  'filter-owner-all'                 => 'الكل',
  'filter-agent'                     => 'مسؤول دعم',
  'filter-agent-all'                 => 'الكل',

  'btn-add'                          => 'إضافة',
  'btn-back'                         => 'عودة',
  'btn-cancel'                       => 'إلغاء',
  'btn-change'                       => 'تغيير',
  'btn-close'                        => 'إغلاق',
  'btn-delete'                       => 'حذف',
  'btn-download'                     => 'تحميل',
  'btn-edit'                         => 'تحرير وتعديل',
  'btn-mark-complete'                => 'مكتمل',
  'btn-submit'                       => 'إرسال',

  // Vocabulary
  'active-tickets-adjective'         => 'نشيط',
  'agent'                            => 'مسؤول دعم فني',
  'agents'                           => 'مسؤولي الدعم الفني',
  'all-depts'                        => 'الكل',
  'attached-images'                  => 'الصور المرفقة',
  'attached-files'                   => 'الملفات المرفقة',
  'attachments'                      => 'المرفقات',
  'category'                         => 'الفئة',
  'closing-reason'                   => 'سبب الإغلاق',
  'closing-clarifications'           => 'توضيحات',
  'colon'                            => ': ',
  'comments'                         => 'التعليقات',
  'complete'                         => 'مكتمل',
  'complete-tickets-adjective'       => 'منجز',
  'created'                          => 'مُنشأ',
  'creation-date'                    => 'Created at :date',
  'crop-image'                       => 'اقتصاص الصورة',
  'date-format'                      => 'Y-m-d',
  'datetime-format'                  => 'Y-m-d H:i',
  'datetimepicker-format'            => 'YYYY-MM-DD HH:mm',
  'datetime-text'                    => ':date, :timeh',
  'deleted-member'                   => 'Deleted member',
  'department'                       => 'قسم',
  'department-shortening'            => 'Dept.',
  'dept-descendant'                  => 'قسم فرعى',
  'description'                      => 'الوصف',
  'discard'                          => 'تجاهل',
  'email'                            => 'البريد الإلكتروني',
  'email-resend-abbr'                => 'FW',
  'flash-x'                          => '×', // &times;
  'intervention'                     => 'Intervention',
  'last-update'                      => 'آخر تحديث',
  'limit-date'                       => 'التاريخ المحدد',
  'list'                             => 'القائمة',
  'mark-complete'                    => 'وضع علامة اكتمال',
  'member'                           => 'مستخدم دعم فني',
  'name'                             => 'الاسم',
  'newest-tickets-adjective'         => 'جديد',
  'no'                               => 'لا',
  'no-replies'                       => 'لا توجد ردود.',
  'owner'                            => 'المالك',
  'priority'                         => 'أفضلية',
  'reopen-ticket'                    => 'إعادة فتح التذكرة',
  'reply'                            => 'الرد',
  'responsible'                      => 'Responsible',
  'start-date'                       => 'تاريخ البدء',
  'status'                           => 'الحالة',
  'subject'                          => 'الموضوع',
  'tags'                             => 'العلامات',
  'ticket'                           => 'تذكرة',
  'tickets'                          => 'تذاكر',
  'today'                            => 'اليوم',
  'tomorrow'                         => 'الغد',
  'update'                           => 'تحديث',
  'updated-date'                     => 'Updated :date',
  'user'                             => 'مستخدم',
  'year'                             => 'سنة',
  'yes'                              => 'نعم',
  'yesterday'                        => 'في الامس',

  // Days of week
  'day_1'                            => 'الإثنين',
  'day_2'                            => 'الثلاثاء',
  'day_3'                            => 'الأربعاء',
  'day_4'                            => 'الخميس',
  'day_5'                            => 'الجمعة',
  'day_6'                            => 'السبت',
  'day_7'                            => 'الأحد',
  'day_0'                            => 'Sunday',

    // Time units abbreviations
  'second-abbr'                      => 's.',
  'minute-abbr'                      => 'mi.',
  'hour-abbr'                        => 'h.',
  'day-abbr'                         => 'd.',
  'week-abbr'                        => 'wk.',
  'month-abbr'                       => 'mo.',

 /*
  *  Page specific
  */

// ____
  'index-title'                      => 'Helpdesk main page',

// tickets/____
  'index-my-tickets'                 => 'تذاكري',

  'btn-create-new-ticket'            => 'إنشاء ش جديد',
  'index-complete-none'              => 'لا توجد تذاكر كاملة',
  'index-active-check'               => 'تأكد من التحقق من التذاكر النشطة إذا لم تتمكن من العثور على تذكرتك.',
  'index-active-none'                => 'لا توجد تذاكر نشطة',
  'index-create-new-ticket'          => 'إنشاء تذكرة جديدة',
  'index-complete-check'             => 'تأكد من التحقق من التذاكر الكاملة إذا لم تتمكن من العثور على تذكرتك.',
  'ticket-notices-title'             => 'الإشعارات',
  'ticket-notices-empty'             => 'لا توجد إشعارات نشطة',

// Newest tickets page reload Modal
  'reload-countdown'                 => 'The ticket table will reload in <kbd class=":num_class"><span id="counter">:num</span></kbd> seconds.',
  'reload-reloading'                 => 'يتم إعادة تحميل طاولة التذاكر ... الرجاء الانتظار',

// Ticket forms messages
  'update-agent-same'                => 'Agent was not changed! Ticket <a href=":link" title=":title"><u>:name</u></a>',
  'update-agent-ok'                  => 'Agent updated to ":new_agent" on ticket <a href=":link" title=":title"><u>:name</u></a>',
  'update-priority-same'             => 'Priority was not changed! Ticket <a href=":link" title=":title"><u>:name</u></a>',
  'update-priority-ok'               => 'Priority updated to ":new" in ticket <a href=":link" title=":title"><u>:name</u></a>',
  'update-status-same'               => 'Status was not changed! Ticket <a href=":link" title=":title"><u>:name</u></a>',
  'update-status-ok'                 => 'Status updated to ":new" in ticket <a href=":link" title=":title"><u>:name</u></a>',

// tickets/create
  'create-new-ticket'                => 'إنشاء تذكرة جديدة',
  'create-ticket-brief-issue'        => 'A brief of your issue ticket',
  'create-ticket-notices'            => 'إشعارات',
  'ticket-owner-deleted-warning'     => 'تم حذف المستخدم. لن تظهر في قائمة إصدارات المالك',
  'ticket-owner-no-email'            => '(Has not e-mail)',
  'ticket-owner-no-email-warning'    => 'المستخدم ليس لديه بريد إلكتروني: لن يتلقى أي إشعار عبر البريد الإلكتروني',
  'create-ticket-owner-help'         => 'You may choose from whom is the ticket or who does it affect',
  'create-ticket-visible'            => 'مرئي',
  'create-ticket-visible-help'       => 'Choose ticket visibility for the assigned owner',
  'create-ticket-change-list'        => 'تغيير القائمة',
  'create-ticket-info-start-date'    => 'Default: Now',
  'create-ticket-info-limit-date'    => 'Default: No limit',
  'create-ticket-describe-issue'     => 'صِف المشكلة هنا بالتفصيل',
  'create-ticket-intervention-help'  => 'الإجراءات المتخذة لحل التذكرة',
  'create-ticket-switch-to-note'     => 'التبديل إلى ملاحظة داخلية',
  'create-ticket-switch-to-comment'  => 'التبديل للرد على المستخدم',

  'attach-files'                     => 'إرفاق الملفات',
  'pending-attachment'               => 'سيتم تحميل هذا الملف عند تحديث التذكرة',
  'attachment-new-name'              => 'اسم جديد',

  'edit-ticket'                      => 'تعديل على التذكرة',
  'attachment-edit'                  => 'تعديل على المرفق',
  'attachment-edit-original-filename'=> 'اسم الملف الأصلي',
  'attachment-edit-new-filename'     => 'اسم ملف جديد',
  'attachment-edit-crop-info'        => 'حدد منطقة داخل الصورة لاقتصاصها. سيتم تطبيقه بعد تحديث حقول المرفقات',

  'attachment-update-not-valid-name' => 'The new filename for ":file" must be at least 3 character long. HTML is not allowed',
  'attachment-error-equal-name'      => 'Name and description for file ":file" can\'t be the same',
  'attachment-update-not-valid-mime' => 'The file ":file" is not of any valid type',
  'attachment-update-crop-error'     => 'تعذر اقتصاص الصورة بالأحجام المحددة',

  'show-ticket-title'                => 'التذكرة',
  'show-ticket-creator'              => 'انشأ بواسطة',
  'show-ticket-js-delete'            => 'هل أنت متأكد أنك تريد حذف: ',
  'show-ticket-modal-delete-title'   => 'حذف التذكرة',
  'show-ticket-modal-delete-message' => 'Are you sure you want to delete ticket: :subject?',
  'show-ticket-modal-edit-fields'    => 'تحرير المزيد من الحقول',

  'show-ticket-modal-complete-blank-intervention-check' => 'Leave blank intervention',
  'show-ticket-complete-blank-intervention-alert'       => 'To complete the ticket you must confirm that you leave intervention field blank',
  'show-ticket-modal-complete-blank-reason-alert'       => 'لإكمال التذكرة ، يجب عليك الإشارة إلى سبب الإغلاق',
  'show-ticket-complete-bad-status'                     => 'التذكرة لم تكتمل: الحالة المحددة غير صالحة',
  'show-ticket-complete-bad-reason-id'                  => 'التذكرة لم تكتمل: السبب المحدد غير صالح',

  'complete-by-user'                 => 'Ticket completed by :user.',
  'reopened-by-user'                 => 'Ticket reopened by :user.',

  'ticket-error-not-valid-file'                => 'لم يتم إرفاق ملف صالح',
  'ticket-error-not-valid-object'              => 'This file can\'t be processed: :name',
  'ticket-error-max-size-reached'              => 'The file ":name" and following can\'t be attached as they exceed the max available space for this ticket, which is of :available_MB MB',
  'ticket-error-max-attachments-count-reached' => 'The file ":name" and following can\'t be attached as they exceed the max number of :max_count attached files per ticket',
  'ticket-error-delete-files'                  => 'لا يمكن حذف بعض الملفات',
  'ticket-error-file-not-found'                => 'The file ":name" could not be found',
  'ticket-error-file-not-deleted'              => 'The file ":name" could not be deleted',

   // Tiquet visible / no visible
  'ticket-visible'                => 'تذكرة مرئية',
  'ticket-hidden'                 => 'التذكرة المخفية',
  'ticket-hidden-button-title'    => 'تبديل رؤية المستخدم',
  'ticket-visibility-changed'     => 'تغيرت رؤية التذاكر',
  'ticket-hidden-0-comment-title' => 'Changed to visible by <b>:agent</b>',
  'ticket-hidden-0-comment'       => 'Ticket is now <b>visible</b> for owner',
  'ticket-hidden-1-comment-title' => 'Hided by <b>:agent</b>',
  'ticket-hidden-1-comment'       => 'Ticket is now <b>hidden</b> for owner',

  // Comments
  'comment'                    => 'تعليق',
  'note'                       => 'مذكرة داخلية',
  'comment-reply-title'        => 'الرسالة مرئية للمستخدمين',
  'comment-reply-from-owner'   => 'Reply from <b>:owner</b>',
  'reply-from-owner-to'        => 'Reply from <b>:owner</b> to <b>:recipients</b>',

  'comment-note-title'         => 'ملاحظة مخفية للمستخدم',
  'comment-note-from-agent'    => 'Note from <b>:agent</b>',
  'comment-note-from-agent-to' => 'Note from <b>:agent</b> to <b>:recipients</b>',

  'comment-completetx-title'   => 'التذكرة مكتملة',
  'comment-complete-by'        => 'Tancat per <b>:owner</b>',

  'comment-reopen-title'       => 'تم إعادة فتح التذكرة',
  'comment-reopen-by'          => 'Reopened by <b>:owner</b>',

  'show-ticket-add-comment'                => 'أضف تعليقاً',
  'show-ticket-add-note'                   => 'أضف ملاحظة داخلية',
  'show-ticket-add-comment-type'           => 'النوع',
  'show-ticket-add-comment-note'           => ' ملاحظة داخلية',
  'show-ticket-add-comment-reply'          => 'الرد على المستخدم',
  'show-ticket-add-comment-notificate'     => 'يُشعر',
  'show-ticket-add-com-check-email-text'   => 'أضف نصًا في إشعار المستخدم',
  'show-ticket-add-com-check-intervention' => 'Append this text in intervention field (visible by user)',
  'show-ticket-add-com-check-resolve'      => 'Complete this ticket and apply the status',
  'add-comment-confirm-blank-intervention' => 'The "intervention" field is empty. Would you want to close ticket anyway?',

  'edit-internal-note-title'         => 'تحرير الملاحظة الداخلية',
  'show-ticket-edit-com-check-int'   => 'Add text to the intervention field',
  'show-ticket-delete-comment'       => 'حذف تعليق',
  'show-ticket-delete-comment-msg'   => 'هل أنت متأكد أنك تريد حذف هذا التعليق؟',
  'show-ticket-email-resend'         => 'إعادة إرسال البريد الإلكتروني',
  'show-ticket-email-resend-agent'   => '(Ticket agent)',
  'show-ticket-email-resend-owner'   => '(Ticket owner)',
  'notification-resend-confirmation' => 'تم إعادة إرسال الإشعارات بشكل صحيح',
  'notification-resend-no-recipients'=> 'لم يتم تحديد المستلمين',

  // Validations
  'validation-error'                 => 'لم يتم إرسال هذا النموذج',
  'validate-ticket-subject.required' => 'يجب تعيين الموضوع. يرجى الإشارة في بضع كلمات إلى ما يدور حوله',
  'validate-ticket-subject.min'      => 'يجب أن يكون الموضوع أطول',
  'validate-ticket-content.required' => 'يجب تعيين الوصف. إذا قمت بإرفاق أي صورة ، فستحتاج إلى إضافة نص وصف على أي حال',
  'validate-ticket-content.min'      => 'يجب أن يكون الوصف أطول ، بالرغم من وجود صورة مرفقة',
  'validate-ticket-start_date-format'=> 'The start date format is not valid. Correct is: ":format"',
  'validate-ticket-start_date'       => 'سنة تاريخ البدء غير صالحة',
  'validate-ticket-limit_date-format'=> 'The limit date format is not valid. Correct is: ":format"',
  'validate-ticket-limit_date'       => 'سنة تاريخ الانتهاء غير صالحة',
  'validate-ticket-limit_date-lower' => 'لا يمكن أن يكون تاريخ الإنتهاء أقل من تاريخ البدء',

  'ticket-destroy-error'             => 'The ticket could not be deleted: :error',
  'comment-destroy-error'            => 'The comment could not be deleted: :error',

  // Comment form
  'validate-comment-required'        => 'يجب عليك كتابة نص التعليق',
  'validate-comment-min'             => 'يجب عليك كتابة نص أطول للتعليق',

// Ticket search form
   'searchform-nav-text'             => 'Search',
   'searchform-title'                => 'Search tickets',

   'searchform-creator'              => 'المُنشئ',
   'searchform-department'           => 'القسم',
   'searchform-comments'             => 'نص التعليقات',
   'searchform-attachment_filename'  => 'اسم الملف المرفق',
   'searchform-any_text_field'       => 'أي حقل نصي',
   'searchform-created_at'           => 'تاريخ ووقت الإنشاء',
   'searchform-completed_at'         => 'وقت / تاريخ الانتهاء',
   'searchform-updated_at'           => 'اخر تحديث',
   'searchform-read_by_agent'        => 'تمت القراءة بواسطة مسؤول الدعم المعين',

   'searchform-help-creator'         => 'Who created the ticket (Sometimes is an agent in the name of a Member)',
   'searchform-help-owner'           => 'فني الدعم الذي يملك التذكرة',
   'searchform-help-department'      => ' الإدارات المالكة',
   'searchform-help-any_text_field'  => 'Find in any text field in: Subject, Description, Intervention, Comments or attachment fields',

   'searchform-creator-none'         => '- none -',
   'searchform-owner-none'           => '- none -',
   'searchform-department-none'      => '- none -',
   'searchform-list-none'            => '- none -',

   'searchform-status-none'          => '- none -',
   'searchform-status-rule-any'      => 'أياً من المحدد',
   'searchform-status-rule-none'     => 'لا شيء من المحدد',

   'searchform-priority-none'        => '- none -',
   'searchform-priority-rule-any'    => 'أياً من المحدد',
   'searchform-priority-rule-none'   => 'لا شيء من المحدد',

   'searchform-category-none'        => '- none -',
   'searchform-agent-none'           => '- none -',

   'searchform-tags-rule-no-filter'   => 'من دون تصفية',
   'searchform-tags-rule-has_not_tags'=> 'بدون علامات',
   'searchform-tags-rule-has_any_tag' => 'مع أي علامة',
   'searchform-tags-rule-any'         => 'أي من المحدد',
   'searchform-tags-rule-all'         => 'تم تحديد كل شيء',
   'searchform-tags-rule-none'        => 'لا شيء من المحدد',

   'searchform-date-type-from'       => 'من المحدد',
   'searchform-date-type-until'      => 'حتى يتم التحديد',
   'searchform-date-type-exact_year' => 'السنة بالضبط',
   'searchform-date-type-exact_month'=> 'سنة، شهر',
   'searchform-date-type-exact_day'  => 'اليوم بالضبط',

   'searchform-read_by_agent-none'   => 'من دون تصفية',
   'searchform-read_by_agent-yes'    => 'نعم',
   'searchform-read_by_agent-no'     => 'لا',

   'searchform-btn-submit'           => 'بحث',

   'searchform-validation-no-field'  => 'لم يتم تقديم أي حقل',
   'searchform-validation-success'   => ':num search fields registered',

   'searchform-results-title'        => 'نتائج البحث',
   'searchform-btn-edit'             => 'تعديل البحث',
   'searchform-btn-web'              => 'بحث عن عنوان الويب',
   'searchform-help-btn-web'         => 'هذا رابط دائم لهذا البحث',

 /*
  *  Controllers
  */

// AdministratorsController
  'administrators-are-added-to-administrators'      => 'Administrators :names are added to administrators',
  'administrators-is-removed-from-team'             => 'Removed administrator\s :name from the administrators team',

// CategoriesController
  'category-name-has-been-created'   => 'The category :name has been created!',
  'category-name-has-been-modified'  => 'The category :name has been modified!',
  'category-name-has-been-deleted'   => 'The category :name has been deleted!',

// PrioritiesController
  'priority-name-has-been-created'   => 'The priority :name has been created!',
  'priority-name-has-been-modified'  => 'The priority :name has been modified!',
  'priority-name-has-been-deleted'   => 'The priority :name has been deleted!',
  'priority-all-tickets-here'        => 'All priority related tickets here',

// StatusesController
  'status-name-has-been-created'   => 'The status :name has been created!',
  'status-name-has-been-modified'  => 'The status :name has been modified!',
  'status-name-has-been-deleted'   => 'The status :name has been deleted!',
  'status-all-tickets-here'        => 'جميع التذاكر المتعلقة بالحالة هنا',

// CommentsController
  'comment-has-been-added-ok'        => 'تمت إضافة التعليق بنجاح',
  'comment-has-been-updated'         => 'تم تحديث التعليق',
  'comment-has-been-deleted'         => 'تم حذف التعليق',

// NotificationsController
  // E-mail translations located at email/globals.php

 // TicketsController
  'the-ticket-has-been-created'      => 'The ticket has been created! <a href=":link" title=":title"><u>:name</u></a>',
  'the-ticket-has-been-modified'     => 'تم تعديل التذكرة!',
  'the-ticket-has-been-deleted'      => 'The ticket :name has been deleted!',
  'the-ticket-has-been-completed'    => 'The ticket has been completed! <a href=":link" title=":title"><u>:name</u></a>',
  'the-ticket-has-been-reopened'     => 'The ticket :name has been reopened! <a href=":link" title=":title"><u>:name</u></a>',
  'ticket-status-link-title'         => 'عرض التذكرة',

  'you-are-not-permitted-to-do-this' => 'لا يسمح لك للقيام بهذا العمل!',

 /*
 *  Middlewares
 */

 // EnvironmentReadyMiddleware
 'environment-not-ready'                 => 'لم ينته المسؤول من التكوين المطلوب للسماح بإنشاء التذاكر',

 //  IsAdminMiddleware IsAgentMiddleware UserAccessMiddleware
  'you-are-not-permitted-to-access'     => 'لا يسمح لك للوصول إلى هذه الصفحة!',

];
