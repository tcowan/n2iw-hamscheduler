DEST = /var/www/html/vota

all : 
	@rsync -tru --info=name --include-from=inc --exclude-from=exc . $(DEST)
