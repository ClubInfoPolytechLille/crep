all: redirs
	cd img; make

redirs:
	for i in $$(cd pages; echo *.php); do echo "<?php require('index.php') // AUTOGEN ?>" > $$i; done

clean:
	cd img; make clean
	for i in *.php; do if grep -q "// AUTOGEN" $$i; then rm -rf $$i; fi; done
