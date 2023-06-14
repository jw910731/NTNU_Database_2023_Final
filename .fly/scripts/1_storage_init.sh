FOLDER=/var/www/html/storage/app
if [ ! -d "$FOLDER" ]; then
    echo "$FOLDER is not a directory, copying storage_ content to storage"
    cp -r /var/www/html/storage_/. /var/www/html/storage
    echo "deleting storage_..."
    rm -rf /var/www/html/storage_
fi

if [ ! -f "/var/www/html/storage/database/database.sqlite" ]; then
    mkdir -p  "/var/www/html/storage/database"
    touch "/var/www/html/storage/database/database.sqlite"
fi