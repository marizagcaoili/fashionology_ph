<a  class='lognowin' ng-show="{{f_account_id == null}}" style='color:#fff;'data-toggle="modal" data-target="#loginModal">
   <li>login</li>
</a>
<a  class='signmeup' ng-show="{{f_account_id == null}}" href='/register' style='color:#fff;' >
   <li>sign up</li>
</a>
<a  class='userHi' ng-show="{{f_account_id != null || f_account_id > 0}}" style='color:#fff;' href='/dashboard' target='_self'>
   <li><i class="fa fa-user" aria-hidden="true"></i> Hi, {{user}}</li>
</a>
<a class='getLog' ng-show="{{f_account_id != null || f_account_id > 0}}" style='color:#fff;' ng-click='logout()'>
   <li>logout</li>
</a>