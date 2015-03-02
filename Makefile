REDIRS=$(shell cd pages; echo *.php)

all: redirs
	cd img; make

%.php: pages/%.php
	echo "<?php require('index.php') ?>" > $@

redirs: $(REDIRS)

clean:
	cd img; make clean
	rm -rf $(REDIRS)
