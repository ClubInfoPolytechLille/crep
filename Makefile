BOOTSTRAPVER=3.3.2
JQUERYVER=2.1.1

REDIRS=$(shell cd pages; echo *.php)
BOOTSTRAPNAME=bootstrap-$(BOOTSTRAPVER)-dist

all: redirs bootstrap
	cd img; make

%.php: pages/%.php
	echo "<?php require('index.php') ?>" > $@

redirs: $(REDIRS)

js/jquery.min.js:
	wget http://code.jquery.com/jquery-$(JQUERYVER).min.js -O $@

bootstrap:
	wget https://github.com/twbs/bootstrap/releases/download/v$(BOOTSTRAPVER)/$(BOOTSTRAPNAME).zip -O $(BOOTSTRAPNAME).zip
	unzip $(BOOTSTRAPNAME).zip $(BOOTSTRAPNAME)/fonts/* $(BOOTSTRAPNAME)/css/bootstrap.min.css $(BOOTSTRAPNAME)/js/bootstrap.min.js
	cp -rf $(BOOTSTRAPNAME)/* .
	rm -rf $(BOOTSTRAPNAME)*

bootstrapClean:
	rm -rf fonts/glyphicons* */bootstrap*

fonts/robotech-gp.ttf:
	wget http://dl.dafont.com/dl/?f=robotech_gp -O robotech_gp.zip
	unzip robotech_gp.zip ROBOTECH\ GP.ttf
	mv ROBOTECH\ GP.ttf $@
	rm -rf robotech_gp.zip ROBOTECH\ GP.ttf 

fonts/robotaur.ttf:
	wget http://dl.dafont.com/dl/?f=robotaur -O robotaur.zip
	unzip robotaur robotaur.ttf -d fonts
	rm -rf robotaur.zip

clean: bootstrapClean
	cd img; make clean
	rm -rf $(REDIRS) js/jquery.min.js fonts/robot*.ttf
