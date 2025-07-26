# Popup Notification System

A popup notification system has been added to all pages in your Laravel application. This system automatically displays popups for Laravel session messages, validation errors, and provides JavaScript functions for custom notifications.

## Features

- **Automatic Laravel Integration**: Automatically shows popups for session messages and validation errors
- **Toast Notifications**: Non-intrusive notifications that appear in the top-right corner
- **Modal Dialogs**: More prominent notifications for errors and important messages
- **Multiple Types**: Success, Error, Warning, and Info notifications
- **Auto-dismiss**: Toast notifications automatically disappear after 5 seconds
- **Responsive Design**: Works on all screen sizes
- **Beautiful Animations**: Smooth slide-in and fade-out effects

## How It Works

The popup system is now active on all pages and will automatically display notifications when:

1. **Laravel Session Messages**: When you redirect with session messages
2. **Validation Errors**: When form validation fails
3. **Custom JavaScript**: When you call the JavaScript functions

## Laravel Session Messages

In your controllers, you can now use Laravel's session flash messages and they will automatically appear as popups:

```php
// Success message (shows as green toast)
return redirect()->back()->with('success', 'Profile updated successfully!');

// Error message (shows as red modal)
return redirect()->back()->with('error', 'Failed to update profile.');

// Warning message (shows as yellow toast)
return redirect()->back()->with('warning', 'Please verify your email.');

// Info message (shows as blue toast)
return redirect()->back()->with('info', 'New features available!');
```

## Validation Errors

Validation errors are automatically displayed in a red modal with a list of all errors:

```php
// This will automatically show a popup with validation errors
$request->validate([
    'name' => 'required|min:3',
    'email' => 'required|email',
    'password' => 'required|min:8',
]);
```

## JavaScript Functions (Optional)

You can also trigger popups manually using JavaScript:

```javascript
// Show success toast
showSuccess('Operation completed successfully!');

// Show error modal
showError('Something went wrong!');

// Show warning toast
showWarning('Please be careful!');

// Show info toast
showInfo('Here is some information');

// Advanced usage
showToast('Custom message', 'success', 3000); // 3 second duration
showModal('Custom Title', 'Custom message', 'error');
```

## Notification Types

- **Success**: Green gradient with check icon (default: toast)
- **Error**: Red gradient with exclamation icon (default: modal)
- **Warning**: Yellow gradient with warning icon (default: toast)
- **Info**: Blue gradient with info icon (default: toast)

## Testing

To test the popup system:

1. **Test Session Messages**: In any controller, add a redirect with session message:
   ```php
   return redirect()->back()->with('success', 'Test message!');
   ```

2. **Test Validation Errors**: Create a form with validation and submit invalid data

3. **Test JavaScript**: Open browser console and run:
   ```javascript
   showSuccess('Test popup!');
   ```

## Files Added/Modified

- ✅ `resources/views/components/popup-notifications.blade.php` (new)
- ✅ `resources/views/frontend/layouts/master.blade.php` (modified)
- ✅ `resources/views/backend/layoutes/master.blade.php` (modified)
- ✅ `resources/views/backend/includes/footer.blade.php` (modified)
- ✅ `resources/views/frontend/includes/footer.blade.php` (modified)

The popup system is now ready and will automatically work with your existing Laravel application!