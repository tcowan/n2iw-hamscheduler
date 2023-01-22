DEST = /tmp/vota2



all : 
	@rsync -tru --info=name --include-from=inc --exclude-from=exc . $(DEST)
