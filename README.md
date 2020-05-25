
Implement Web with PHP httpd and RDS in AWS.

Terraform v0.12.25

1.Deploy
terraform init
terraform validate
terraform plan
terraform apply -auto-approve
output: ec2_url
        db_url

2.Undeploy
terraform apply -auto-approve

3.Verification
http://ec2_url/index.php
output;
    Visits 10
