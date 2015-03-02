REDIRS=$(shell cd pages; echo *.php)

all: redirs
	cd img; make

%.php: pages/%.php
	echo "<?php require('index.php') // AUTOGEN ?>" > $@

redirs: $(REDIRS)

clean:
	cd img; make clean
	for i in *.php; do if grep -q "// AUTOGEN" $$i; then rm -rf $$i; fi; done
