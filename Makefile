NAME = testaspect
VERSION = $(shell git describe --tags --abbrev=0 2>/dev/null || echo "test")
ARCHIVE = $(NAME)-$(VERSION).zip
ZIP_FILES = $(shell git ls-files -c -o --exclude-standard; find lib -type f)
EXCLUDE_FILES = composer.json composer.lock Makefile scoper.inc.php .gitignore .github/\*
DIST_DIR = dist

.PHONY: all clean zip install update

all: zip

zip: clean
	@echo "Creating ZIP archive..."
	@mkdir -p $(DIST_DIR)
	@zip -r $(DIST_DIR)/$(ARCHIVE) $(ZIP_FILES) $(foreach file,$(EXCLUDE_FILES),-x $(file))
	@echo "Archive created: $(DIST_DIR)/$(ARCHIVE)"

clean:
	@echo "Cleaning up..."
	@rm -rf $(DIST_DIR)

install:
	@echo "Installing dependencies..."
	@composer install --no-dev --optimizeвип-autoloader

update:
	@echo "Updating dependencies..."
	@composer update --no-dev --optimize-autoloader
