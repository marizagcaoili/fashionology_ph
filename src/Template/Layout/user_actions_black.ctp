<a  class='lognowin' ng-show="{{f_account_id == null}}" style='color:#333;'data-toggle="modal" data-target="#loginModal">
   <li>login</li>
</a>
<a  class='signmeup' target='_self' ng-show="{{f_account_id == null}}" href='/register' style='color:#333;' >
   <li>sign up</li>
</a>
<a  class='userHi' ng-show="{{f_account_id != null || f_account_id > 0}}" style='color:#333;' href='/dashboard' target='_self'>
   <li><i class="fa fa-user" aria-hidden="true"></i> Hi, {{user}}</li>
</a>
<a class='getLog' ng-show="{{f_account_id != null || f_account_id > 0}}" style='color:#333;' ng-click='logout()'>
   <li>logout</li>
</a>