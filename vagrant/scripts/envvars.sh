#!/bin/bash

echo "###########################################"
echo "#"
echo "# Importing environment variables..."
echo "#"
echo "###########################################"

CONFIG_PROVISION_PATH="/temp/config"
PROFILE="/home/vagrant/.profile"

sed -i "s#. /home/vagrant/.environment_vars##" $PROFILE
sed -i "/^$/d" $PROFILE

cat $CONFIG_PROVISION_PATH/environment_vars
cp -vf $CONFIG_PROVISION_PATH/environment_vars /home/vagrant/.environment_vars
echo ". /home/vagrant/.environment_vars" >> $PROFILE
