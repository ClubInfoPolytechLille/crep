BOOTSTRAPVER=3.3.2

REDIRS=$(shell cd pages; echo *.php)
BOOTSTRAPNAME=bootstrap-$(BOOTSTRAPVER)-dist

all: redirs bootstrap
	cd img; make

%.php: pages/%.php
	echo "<?php require('index.php') ?>" > $@

redirs: $(REDIRS)

bootstrap:
	wget https://github.com/twbs/bootstrap/releases/download/v$(BOOTSTRAPVER)/$(BOOTSTRAPNAME).zip -O $(BOOTSTRAPNAME).zip
	unzip $(BOOTSTRAPNAME).zip $(BOOTSTRAPNAME)/fonts/* $(BOOTSTRAPNAME)/css/bootstrap.min.css $(BOOTSTRAPNAME)/js/bootstrap.min.js
	cp -rf $(BOOTSTRAPNAME)/* .
	rm -rf $(BOOTSTRAPNAME)*

bootstrapClean:
	rm -rf fonts/glyphicons* */bootstrap*

clean: bootstrapClean
	cd img; make clean
	rm -rf $(REDIRS)
