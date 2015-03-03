BOOTSTRAPVER=3.3.2
JQUERYVER=2.1.1
FONTS=robotech-gp.ttf robotaur.ttf

BOOTSTRAPNEEDED=js/bootstrap.min.js css/bootstrap.min.css fonts/glyphicons-halflings-regular.*

REDIRS=$(shell cd pages; echo *.php)
BOOTSTRAPNAME=bootstrap-$(BOOTSTRAPVER)-dist

all: redirs $(BOOTSTRAPNEEDED) js/jquery.min.js	$(addprefix fonts/,$(FONTS))
	cd img; make

# Redirs
%.php: pages/%.php
	echo "<?php require('index.php') ?>" > $@

redirs: $(REDIRS)

js/jquery.min.js:
	wget http://code.jquery.com/jquery-$(JQUERYVER).min.js -O $@

$(BOOTSTRAPNEEDED):
	wget https://github.com/twbs/bootstrap/releases/download/v$(BOOTSTRAPVER)/$(BOOTSTRAPNAME).zip -O $(BOOTSTRAPNAME).zip
	unzip $(BOOTSTRAPNAME).zip $(addprefix $(BOOTSTRAPNAME),$(BOOTSTRAPNEEDED))
	cp -rf $(BOOTSTRAPNAME)/* .
	rm -rf $(BOOTSTRAPNAME)*

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
	rm -rf $(REDIRS) $(BOOTSTRAPNEEDED) $(addprefix fonts/,$(FONTS)) js/jquery.min.js
