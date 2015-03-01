GENIMG=lille1.png polytechlille.png
CMPIMG=CREP-1.jpg CREP-2.jpg CREP-3.jpg CREP-4.jpg CREP-5.jpg

all: $(GENIMG) $(CMPIMG)

%.png: %.svg
	inkscape -f $< -e $@
	convert -background none $< $@
	optipng -o7 $@

%.jpg: orig/%.jpg
	convert -resize x600 -strip -interlace Plane -gaussian-blur 0.05 -quality 90% $< $@

clean:
	rm -rf $(GENIMG) $(CMPIMG)