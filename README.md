
Implement Web with PHP httpd and RDS in AWS.

Terraform v0.12.25

1).Deploy
terraform init
terraform validate
terraform plan
terraform apply -auto-approve
output: ec2_url
        db_url
        
2) debug 
i)Php Don't Run in Web index.php
php not running  attach to /ete/httpd/conf/http.conf
<FilesMatch \.php$>
​SetHandler application/x-httpd-php
​</FilesMatch>
ii) db can not access 
In SELinux (Security-Enhanced Linux), punch a hole
getsebool -a | grep httpd
setsebool -P httpd_can_network_connect 1

3).Verification
http://ec2_url/index.php
output;
    Visits 10

4).Undeploy
terraform destroy -auto-approve

