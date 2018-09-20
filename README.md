# LeaveManager WordPress Plugin

## Proof of Concept

### Installation
1. Clone the repository to your wordpress plugins directory
2. Login to dashboard, activate the leavemanager plugin from plugins list.
3. Goto Settings->Leave Menu(?), select a page which you need to display the leave application form.
3. When you activate the plugin it will create a new user role called employee.
5. You can assign this role to any user.
4. Plugin will also create a new content type called "leave_requests"
4. It will also use a custom template for the page form page.
6. The plugin will redirect the user with employee role to the leave application page.
7. On leave application page, it will list all the users with employee role (need to exclude the current user though)
8. All the leave applications are available as content type in dashboard (here we need to fine tune it, so that it will not list on the normal post listing)


### Things to do
1. client side validation - using HTML5 features only
2. server side validation - not done
3. data validation - not done
4. separate field for each columns  - not done, right now I am concatenating all together as a content for “Leave" content type.


* there are couple of fine tuning required here and there (related with code formatting, best practices implementation etc.) *

